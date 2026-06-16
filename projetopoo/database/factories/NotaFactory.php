<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Aluno;

class NotaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_aluno' => Aluno::inRandomOrder()->first()->id,
            'disciplina' => $this->faker->randomElement([
                'Matemática', 'Português', 'História', 'Geografia', 'Ciências', 'Artes', 'Inglês'
            ]),
            'nota' => $this->faker->randomFloat(2, 0, 10),
        ];
    }
}