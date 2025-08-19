<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServicoController extends Controller
{

    // Criar registro na tabela servicos (CREATE)
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'descricao' =>'nullable'
        ]);

        $servico = Servico::create($validated);

        return response()->json([
            'message' => 'Serviço cadastrado com sucesso',
            'serviço' => $servico,
        ], 201);
    }

    //Puxar tudo da tabela servicos (READ)
    public function index(): JsonResponse{
        $servicos = Servico::all();

        return response()->json([
            'success' => true,
            'data' => $servicos
        ]);
    }
}
