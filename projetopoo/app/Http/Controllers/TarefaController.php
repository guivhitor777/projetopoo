<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreTarefaRequest;
use App\Http\Requests\UpdateTarefaRequest;
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

    public function store(StoreTarefaRequest $request)
    {
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

    public function update(UpdateTarefaRequest $request, $id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->update([
            'disciplina' => $request->disciplina,
            'descricao' => $request->descricao,
            'prazo' => $request->prazo
        ]);
        return redirect('/tarefas')->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function toggleStatus($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->update(['concluida' => !$tarefa->concluida]);
        return redirect('/tarefas')->with('success', 'Status da tarefa atualizado!');
    }

    public function destroy($id)
    {
        Tarefa::findOrFail($id)->delete();
        return redirect('/tarefas')->with('success', 'Tarefa removida com sucesso!');
    }
}