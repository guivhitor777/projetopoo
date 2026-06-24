<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nota extends Model
{
    use HasFactory;

    protected $table = 'notas';
    public $timestamps = false;

    protected $fillable = ['id_aluno', 'disciplina', 'nota'];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'id_aluno');
    }
}