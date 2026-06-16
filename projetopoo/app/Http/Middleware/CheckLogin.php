<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckLogin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('usuario_id')) {
            return redirect('/login')->with('error', 'Faça login para acessar o sistema.');
        }

        return $next($request);
    }
}