<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CidadeModel;
use Illuminate\Support\Facades\View;

class CidadeController extends Controller
{
    public function index(){
        $cidades = CidadeModel::all();
        return view("welcome", ["cidades" => $cidades]);
    }
}
