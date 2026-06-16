<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aluno;
use App\Models\Nota;
use App\Models\Tarefa;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UsuarioSeeder::class,
            AlunoSeeder::class,
            NotaSeeder::class,
            TarefaSeeder::class,
        ]);

        Aluno::factory(5)->create();
        Nota::factory(10)->create();
        Tarefa::factory(5)->create();
    }
}