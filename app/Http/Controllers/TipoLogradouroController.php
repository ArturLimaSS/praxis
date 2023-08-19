<?php

namespace App\Http\Controllers;

use App\Models\TipoLogradouroModel;
use Illuminate\Http\Request;

class TipoLogradouroController extends Controller
{
    public function index(){
        $tipoLogradouro = TipoLogradouroModel::all();
        return view('tipo', ['tipo_logradouro' => $tipoLogradouro]);
    }
}
