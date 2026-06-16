<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aluno extends Model
{
    use HasFactory;

    protected $table = 'alunos';
    public $timestamps = false;

    protected $fillable = ['nome', 'email', 'senha'];
}