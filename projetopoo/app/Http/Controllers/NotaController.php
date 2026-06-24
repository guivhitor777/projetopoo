<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreNotaRequest;
use App\Http\Requests\UpdateNotaRequest;
use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\Aluno;

class NotaController extends Controller
{
    public function index(Request $request)
    {
        $busca = $request->get('busca');

        $notas = Nota::with('aluno')
            ->when($busca, function ($query, $busca) {
                $query->where('disciplina', 'like', "%{$busca}%")
                    ->orWhereHas('aluno', function ($q) use ($busca) {
                        $q->where('nome', 'like', "%{$busca}%");
                    });
            })
            ->get();

        return view('notas.read', compact('notas', 'busca'));
    }

    public function store(StoreNotaRequest $request)
    {
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

    public function update(UpdateNotaRequest $request, $id)
    {
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