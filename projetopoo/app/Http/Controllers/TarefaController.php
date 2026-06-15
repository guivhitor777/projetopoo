<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::all();
        return view('tarefas.read', compact('tarefas'));
    }

    public function create()
    {
        return view('tarefas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'disciplina' => 'required',
            'descricao' => 'required',
            'prazo' => 'required|date'
        ]);
        Tarefa::create([
            'disciplina' => $request->disciplina,
            'descricao' => $request->descricao,
            'prazo' => $request->prazo
        ]);
        return redirect('/tarefas')->with('success', 'Tarefa cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        return view('tarefas.update', compact('tarefa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'disciplina' => 'required',
            'descricao' => 'required',
            'prazo' => 'required|date'
        ]);
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->update([
            'disciplina' => $request->disciplina,
            'descricao' => $request->descricao,
            'prazo' => $request->prazo
        ]);
        return redirect('/tarefas')->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function destroy($id)
    {
        Tarefa::findOrFail($id)->delete();
        return redirect('/tarefas')->with('success', 'Tarefa removida com sucesso!');
    }
}