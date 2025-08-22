<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlanoAcompanhamento;
use App\Models\Paciente;
use App\Models\Profissional;

class PlanoAcompanhamentoSeeder extends Seeder
{
    public function run(): void
    {
        $pacientes = Paciente::all();
        $profissionais = Profissional::all();

        foreach ($pacientes as $paciente) {
            PlanoAcompanhamento::factory()
                ->count(rand(1, 3))
                ->state(function () use ($paciente, $profissionais) {
                    return [
                        'paciente_id' => $paciente->id,
                        'profissional_id' => $profissionais->random()->id,
                    ];
                })
                ->create();
        }
    }
}
