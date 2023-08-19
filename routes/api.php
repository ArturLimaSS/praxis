<?php

use App\Http\Controllers\PessoaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/pessoa', [PessoaController::class, 'store']);