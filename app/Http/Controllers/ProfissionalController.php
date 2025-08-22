<?php

namespace App\Http\Controllers;

use App\Models\Profissional;
use Illuminate\Http\Request;

class ProfissionalController extends Controller
{
    public function store(Request $request){
        $validated = $request ->validate([
            'name' => 'required|string|max:255',
            'especialidade' => 'required|integer',
            'registro_profissional' => 'required|string|size:7',
            'cnpj' => 'required|string|size:14',
            'telefone' => 'required|string|max:11',
            'email' => 'required|string|max:255',
            'disponibilidade' => 'nullable|string',
        ]);

        $profissional = Profissional::create($validated);

        return response() -> json([
            'message'=> 'Profissional cadastrado com sucesso',
            'profissional' => $profissional
        ]);
    }
}
