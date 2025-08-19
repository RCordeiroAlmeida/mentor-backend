<?php

use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ServicoController;
use Illuminate\Support\Facades\Route;

Route::post('/pacientes', [PacienteController::class, 'store']);
Route::get('/pacientes', [PacienteController::class, 'index']);

Route::post('/servicos', [ServicoController::class, 'store']);
Route::get('/servicos', [ServicoController::class, 'index']);

