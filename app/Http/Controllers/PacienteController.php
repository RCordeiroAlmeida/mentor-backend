<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\PlanoAcompanhamento;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'nome_pai' => 'nullable|string|max:255',
            'nome_mae' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'telefone' => 'nullable|string|max:20',
            'endereco' => 'nullable|string|max:255',
            'cpf' => 'nullable|string|max:14',
        ]);

        $paciente = Paciente::create($validated);

        return response()->json([
            'message' => 'Paciente cadastrado com sucesso',
            'paciente' => $paciente
        ], 201);
    }

    public function index(): JsonResponse{
        $pacientes = Paciente::orderBy('name')
            ->get()
            ->map(function($paciente){
            $paciente->cpf = '***.***.***-'.substr($paciente->cpf, -2);
            return $paciente;
        });

        return response()->json([
            'success' => true,
            'data' => $pacientes
        ]);
    }

    public function planos($paciente_id){
        $planos = PlanoAcompanhamento::with('profissional')
        ->where('paciente_id', $paciente_id)
        ->get();

        return response()->json([
            'data'=>$planos
        ]);
    }
}
