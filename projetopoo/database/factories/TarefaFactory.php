<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TarefaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'disciplina' => $this->faker->randomElement([
                'Matemática', 'Português', 'História', 'Geografia', 'Ciências', 'Artes', 'Inglês'
            ]),
            'descricao' => $this->faker->sentence(10),
            'prazo' => $this->faker->dateTimeBetween('now', '+3 months')->format('Y-m-d'),
        ];
    }
}