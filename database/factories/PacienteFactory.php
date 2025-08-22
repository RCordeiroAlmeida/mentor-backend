<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    protected $model = \App\Models\Paciente::class;

    public function definition(): array
    {
        // Gerar status 0 ou 1
        $status = $this->faker->randomElement([0, 1]);

        // Gerar CPF formatado
        $cpf = $this->faker->numerify('###.###.###-##');

        // Gerar telefone no padrão (##) #####-####
        $telefone = sprintf('(%02d) %05d-%04d',
            $this->faker->numberBetween(10, 99),
            $this->faker->numberBetween(10000, 99999),
            $this->faker->numberBetween(1000, 9999)
        );

        return [
            'name' => $this->faker->name(),
            'data_nascimento' => $this->faker->date('Y-m-d', '2005-01-01'), // idade mínima 18 anos
            'nome_pai' => $this->faker->name('male'),
            'nome_mae' => $this->faker->name('female'),
            'email' => $this->faker->unique()->safeEmail(),
            'telefone' => $telefone,
            'endereco' => $this->faker->address(),
            'cpf' => $cpf,
            'status' => $status,
        ];
    }
}
