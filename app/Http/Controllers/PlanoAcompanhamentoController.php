<?php

namespace App\Http\Controllers;

use App\Models\PlanoAcompanhamento;
use Illuminate\Http\Request;

class PlanoAcompanhamentoController extends Controller
{
    public function index($paciente_id){
        $planos = PlanoAcompanhamento::with('profissional', 'sessoes')
        ->where('paciente_id', $paciente_id)
        ->orderBy('data_inicio', 'desc')
        ->get();

        return response()->json(['data' => $planos]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'profissional_id' => 'required|exists:profissionais,id',
            'data_inicio' => 'required|date',
            'queixa_inicial' => 'required|string',
        ]);

        $plano = PlanoAcompanhamento::create($validated);

        return response()->json(['data' => $plano], 201);
    }

    public function show($id){
        $plano = PlanoAcompanhamento::with('profissional', 'sessoes', 'paciente')->findOrFail($id);
        return response()->json(['data' => $plano]);
    }
}
