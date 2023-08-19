<?php

use App\Http\Controllers\CidadeController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\TipoLogradouroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/pessoa', [PessoaController::class, 'store']);
Route::get('/pessoa', [PessoaController::class, 'index']);
Route::get('/cidade', [CidadeController::class, 'index']);
Route::get('/tipo', [TipoLogradouroController::class, 'index']);