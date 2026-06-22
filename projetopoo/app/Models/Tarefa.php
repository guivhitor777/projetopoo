<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tarefa extends Model
{
    use HasFactory;

    protected $table = 'tarefas';
    public $timestamps = false;

    protected $fillable = ['disciplina', 'descricao', 'prazo', 'concluida'];

    protected $casts = [
        'concluida' => 'boolean',
    ];
}