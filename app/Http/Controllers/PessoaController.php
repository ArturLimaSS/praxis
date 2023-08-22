<?php

namespace App\Http\Controllers;

//Models

use App\Models\EnderecoModel;
use App\Models\PessoaModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use Exception;

class PessoaController extends Controller
{

    public function show($id)
    {
        try {
            $pessoa = PessoaModel::with('enderecos')
                ->leftJoin('endereco', 'pessoa.id', '=', 'endereco.pessoa_id')
                ->leftJoin('cidade', 'endereco.cidade_id', '=', 'cidade.id')
                ->leftJoin('tipo_logradouro', 'endereco.tipo_logradouro_id', '=', 'tipo_logradouro.id')
                ->select('pessoa.*', 'endereco.logradouro', 'endereco.numero', 'endereco.cep', 'endereco.bairro', 'cidade.nome as cidade', 'tipo_logradouro.nome as tipo_logradouro')
                ->where('pessoa.id', $id)
                ->first();

            return response()->json($pessoa);
        } catch (Exception $e) {
            return response()->json(array('message' => $e));
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|min:4|max:50',
            'idade' => 'required|numeric',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()]);
        }

        try {
            $pessoa = [
                'nome' => $request->input('nome'),
                'email' => $request->input('email'),
                'sexo' => $request->input('sexo'),
                'idade' => $request->input('idade'),
                'senha' => $request->input('senha')
            ];

            $insertPessoa = PessoaModel::create($pessoa);

            $endereco = [
                'tipo_logradouro_id' => $request->input('tipo_logradouro'),
                'cidade_id' => $request->input('cidade'),
                'logradouro' => $request->input('logradouro'),
                'numero' => $request->input('numero'),
                'cep' => $request->input('cep'),
                'bairro' => $request->input('bairro')
            ];

            if (!empty($request->input('cep'))) {
                $insertEndereco = new EnderecoModel($endereco);
                $insertPessoa->enderecos()->save($insertEndereco);
            }

            return response()->json(array('status' => 'success', 'message' => 'Usuário cadastrado com sucesso!'));
        } catch (Exception $e) {
            return response()->json(array('message' => $e));
        }
    }


    public function index()
    {
        $pessoas = PessoaModel::with('enderecos')
            ->leftJoin('endereco', 'pessoa.id', '=', 'endereco.pessoa_id')
            ->leftJoin('cidade', 'endereco.cidade_id', '=', 'cidade.id')
            ->leftJoin('tipo_logradouro', 'endereco.tipo_logradouro_id', '=', 'tipo_logradouro.id')
            ->select('pessoa.*', 'endereco.logradouro', 'endereco.numero', 'endereco.cep', 'endereco.bairro', 'cidade.nome as cidade', 'tipo_logradouro.nome as tipo_logradouro')
            ->get();

        return response()->json($pessoas);
    }

    public function delete(Request $request, PessoaModel $pessoa)
    {
        try {
            $response = PessoaModel::where('id', $request->id)->delete();
            $responseEndereco = EnderecoModel::where('pessoa_id', $request->id)->delete();
            return response()->json(array('status' => 'success', 'message' => 'Pessoa Excluída com sucesso!', "pessoa" => $request->id, "endereco" => $responseEndereco));
        } catch (Exception $e) {
            return response()->json(array('status' => 'error', 'message' => 'Ocorreu um erro ao excluir a pessoa! Entre em contato com o nosso suporte!'));
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|min:4|max:50',
            'idade' => 'required|numeric',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()]);
        }

        try {
            $pessoa = PessoaModel::findOrFail($id);

            $pessoa->update([
                'nome' => $request->input('nome'),
                'email' => $request->input('email'),
                'sexo' => $request->input('sexo'),
                'idade' => $request->input('idade'),
                'senha' => $request->input('senha')
            ]);

            if (!empty($request->input('cep'))) {
                $endereco = [
                    'tipo_logradouro_id' => $request->input('tipo_logradouro'),
                    'cidade_id' => $request->input('cidade'),
                    'logradouro' => $request->input('logradouro'),
                    'numero' => $request->input('numero'),
                    'cep' => $request->input('cep'),
                    'bairro' => $request->input('bairro')
                ];

                $enderecoModel = EnderecoModel::where('pessoa_id', $id)->first();
                if ($enderecoModel) {
                    $enderecoModel->update($endereco);
                } else {
                    $enderecoModel = new EnderecoModel($endereco);
                    $pessoa->enderecos()->save($enderecoModel);
                }
            }

            return response()->json(array('status' => 'success', 'message' => 'Usuário atualizado com sucesso!'));
        } catch (Exception $e) {
            return response()->json(array('message' => $e));
        }
    }
}
