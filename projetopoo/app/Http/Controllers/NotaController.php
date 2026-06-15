<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\Aluno;

class NotaController extends Controller
{
    public function index()
    {
        $notas = Nota::with('aluno')->get();
        return view('notas.read', compact('notas'));
    }

    public function create()
    {
        $alunos = Aluno::all();
        return view('notas.create', compact('alunos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_aluno' => 'required|exists:alunos,id',
            'disciplina' => 'required',
            'nota' => 'required|numeric|min:0|max:10'
        ]);
        Nota::create([
            'id_aluno' => $request->id_aluno,
            'disciplina' => $request->disciplina,
            'nota' => $request->nota
        ]);
        return redirect('/notas')->with('success', 'Nota cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $nota = Nota::findOrFail($id);
        $alunos = Aluno::all();
        return view('notas.update', compact('nota', 'alunos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_aluno' => 'required|exists:alunos,id',
            'disciplina' => 'required',
            'nota' => 'required|numeric|min:0|max:10'
        ]);
        $nota = Nota::findOrFail($id);
        $nota->update([
            'id_aluno' => $request->id_aluno,
            'disciplina' => $request->disciplina,
            'nota' => $request->nota
        ]);
        return redirect('/notas')->with('success', 'Nota atualizada com sucesso!');
    }

    public function destroy($id)
    {
        Nota::findOrFail($id)->delete();
        return redirect('/notas')->with('success', 'Nota removida com sucesso!');
    }
}