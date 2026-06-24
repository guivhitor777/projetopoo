<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreAlunoRequest;
use App\Http\Requests\UpdateAlunoRequest;
use App\Models\Aluno;
use App\Models\Nota;
use Illuminate\Support\Facades\Hash;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::all()->map(function ($aluno) {
            $media = Nota::where('id_aluno', $aluno->id)->avg('nota');
            $aluno->media = $media;
            $aluno->situacao = $media === null ? null : ($media >= 6.0 ? 'aprovado' : 'reprovado');
            return $aluno;
        });
        return view('alunos.read', compact('alunos'));
    }

    public function store(StoreAlunoRequest $request)
    {
        Aluno::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha)
        ]);
        return redirect('/alunos')->with('success', 'Aluno cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.update', compact('aluno'));
    }

    public function update(UpdateAlunoRequest $request, $id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->update(['nome' => $request->nome, 'email' => $request->email]);
        return redirect('/alunos')->with('success', 'Aluno atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Aluno::findOrFail($id)->delete();
        return redirect('/alunos')->with('success', 'Aluno removido com sucesso!');
    }
}