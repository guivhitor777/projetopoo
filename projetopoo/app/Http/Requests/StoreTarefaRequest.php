<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreTarefaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'disciplina' => 'required|string|max:255',
            'descricao' => 'required|string',
            'prazo' => 'required|date'
        ];
    }
    public function messages(): array
    {
        return [
            'disciplina.required' => 'A disciplina é obrigatória.',
            'descricao.required' => 'A descrição é obrigatória.',
            'prazo.required' => 'O prazo é obrigatório.',
            'prazo.date' => 'Informe uma data válida.',
        ];
    }
}