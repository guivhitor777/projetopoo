<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'senha' => 'required|min:6',
            'confirmar_senha' => 'required|same:senha'
        ]);

        Aluno::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha)
        ]);

        return redirect('/login')->with('success', 'Cadastro realizado com sucesso!');
    }

    public function login(Request $request)
    {
        $usuario = Usuario::where('email', $request->email)->first();

        if (!$usuario || !Hash::check($request->senha, $usuario->senha)) {
            return back()->with('error', 'E-mail ou senha inválidos.');
        }

        if ($usuario->tipo !== 'adm') {
            return back()->with('error', 'Acesso restrito apenas para administradores.');
        }

        Session::put('usuario_id', $usuario->id);
        Session::put('usuario_nome', $usuario->nome);
        Session::put('usuario_tipo', $usuario->tipo);

        return redirect('/painel');
    }

    public function showPainel()
    {
        return view('painel');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }
}