<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'alunos';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'email',
        'senha'
    ];
}