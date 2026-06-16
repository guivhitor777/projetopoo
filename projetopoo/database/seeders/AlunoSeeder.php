<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AlunoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('alunos')->insert([
            ['nome' => 'João Silva', 'email' => 'joao@email.com', 'senha' => Hash::make('123456')],
            ['nome' => 'Maria Souza', 'email' => 'maria@email.com', 'senha' => Hash::make('123456')],
            ['nome' => 'Pedro Oliveira', 'email' => 'pedro@email.com', 'senha' => Hash::make('123456')],
        ]);
    }
}