<?php

namespace App\Http\Controllers;

//Models

use App\Models\EnderecoModel;
use App\Models\PessoaModel;
use Illuminate\Http\Request;
use Illuminate\support\facades\DB;

class PessoaController extends Controller
{
    public function store(Request $request)
    {
        try {

            $pessoa = [
                'nome' => $request->input('nome'),
                'email' => $request->input('email'),
                'sexo' => $request->input('sexo'),
                'idade' => $request->input('idade'),
                'senha' => $request->input('senha')
            ];


            $endereco = [
                'tipo_logradouro_id' => 1,
                'cidade_id' => 1,
                'logradouro' => $request->input('logradouro'),
                'numero' => $request->input('numero'),
                'cep' => $request->input('cep'),
                'bairro' => $request->input('bairro')
            ];


            $insertPessoa = PessoaModel::create($pessoa);
            $insertEndereco = new EnderecoModel($endereco);
            $insertPessoa->enderecos()->save($insertEndereco);

            return response()->json(array('message' => 'Usuário cadastrado com sucesso!'));
        } catch (\Exception $e) {
            return response()->json(array('message' => $e));
        }
    }

    public function index(){
        $pessoa = DB::table('pessoa')
        ->join('endereco', 'pessoa.id', '=', 'endereco.pessoa_id')
        ->select('pessoa.*', 'endereco.*')
        ->get();

        return response()->json($pessoa);
    }
}
