<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'endereco' => $this->faker->address,
            'estado' => $this->faker->stateAbbr,
            'cep' => $this->faker->numerify('#####-###'),
            'cnpj' => $this->faker->numerify('##.###.###/####-##'),
            'ie' => $this->faker->numerify('###.###.###.###'),
            'tipoContrato' => $this->faker->text(12),
            'vendedor' => $this->faker->name,
            'tecnico' => $this->faker->name,
            'periodicidade' => $this->faker->text(12),
            'visitas' => $this->faker->text(12),
            'sla' => $this->faker->text(12),
            'regiao' => $this->faker->text(12),
            'observacao' => $this->faker->text(12),
        ];
    }
}
