<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TarefaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tarefas')->insert([
            ['disciplina' => 'Matemática', 'descricao' => 'Resolver exercícios do capítulo 5.', 'prazo' => '2026-06-30'],
            ['disciplina' => 'Português', 'descricao' => 'Fazer redação sobre meio ambiente.', 'prazo' => '2026-07-05'],
            ['disciplina' => 'História', 'descricao' => 'Pesquisa sobre a Revolução Francesa.', 'prazo' => '2026-07-10'],
        ]);
    }
}