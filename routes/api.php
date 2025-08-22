<?php

use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PlanoAcompanhamentoController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ServicoController;

use Illuminate\Support\Facades\Route;

Route::post('/pacientes', [PacienteController::class, 'store']);
Route::get('/pacientes', [PacienteController::class, 'index']);

Route::get('/pacientes/{paciente_id}/planos', [PlanoAcompanhamentoController::class, 'index']);

Route::post('/servicos', [ServicoController::class, 'store']);
Route::get('/servicos', [ServicoController::class, 'index']);

Route::post('profissionais', [ProfissionalController::class, 'store']);

Route::post('/planos', [PlanoAcompanhamentoController::class, 'store']);
Route::get('/planos/{id}', [PlanoAcompanhamentoController::class, 'show']);




