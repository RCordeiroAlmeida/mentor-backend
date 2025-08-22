<?php

namespace Database\Factories;

use App\Models\PlanoAcompanhamento;
use App\Models\Paciente;
use App\Models\Profissional;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanoAcompanhamentoFactory extends Factory
{
    protected $model = PlanoAcompanhamento::class;

    public function definition()
    {
        return [
            'paciente_id' => Paciente::factory(), // cria ou associa paciente
            'profissional_id' => Profissional::first()->id, // cria ou associa profissional
            'data_inicio' => $this->faker->date(),
            'queixa_inicial' => $this->faker->sentence(),
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}
