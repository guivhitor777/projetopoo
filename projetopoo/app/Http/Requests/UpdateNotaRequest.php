<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateNotaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'id_aluno' => 'required|exists:alunos,id',
            'disciplina' => 'required|string|max:255',
            'nota' => 'required|numeric|min:0|max:10'
        ];
    }
    public function messages(): array
    {
        return [
            'id_aluno.required' => 'Selecione um aluno.',
            'id_aluno.exists' => 'Aluno não encontrado.',
            'disciplina.required' => 'A disciplina é obrigatória.',
            'nota.required' => 'A nota é obrigatória.',
            'nota.numeric' => 'A nota deve ser um número.',
            'nota.min' => 'A nota mínima é 0.',
            'nota.max' => 'A nota máxima é 10.',
        ];
    }
}