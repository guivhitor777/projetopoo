<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = 'notas';
    public $timestamps = false;

    protected $fillable = [
        'id_aluno',
        'disciplina',
        'nota'
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'id_aluno');
    }
}