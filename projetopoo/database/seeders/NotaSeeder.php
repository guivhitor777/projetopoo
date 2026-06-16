<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('notas')->insert([
            ['id_aluno' => 1, 'disciplina' => 'Matemática', 'nota' => 8.5],
            ['id_aluno' => 1, 'disciplina' => 'Português', 'nota' => 7.0],
            ['id_aluno' => 2, 'disciplina' => 'Matemática', 'nota' => 9.0],
            ['id_aluno' => 3, 'disciplina' => 'História', 'nota' => 6.5],
        ]);
    }
}