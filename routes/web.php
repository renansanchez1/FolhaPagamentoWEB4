<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\OcorrenciaController;
use App\Http\Controllers\FolhaPagamentoController;
use App\Http\Controllers\ContaPagarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/', function () {
    return redirect()->route('funcionarios.index');
});

Route::resource('funcionarios', FuncionarioController::class);
Route::resource('ocorrencias', OcorrenciaController::class);
Route::resource('contas-pagar', ContaPagarController::class)->parameters([
    'contas-pagar' => 'conta_pagar'
]);
Route::resource('folhas-pagamento', FolhaPagamentoController::class)->parameters([
    'folhas-pagamento' => 'folha_pagamento'
]);
