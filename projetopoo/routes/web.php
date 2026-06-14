<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\TarefaController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/painel', [AuthController::class, 'showPainel']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/notas', [NotaController::class, 'index']);
Route::get('/notas/create', [NotaController::class, 'create']);
Route::post('/notas', [NotaController::class, 'store']);
Route::get('/notas/{id}/edit', [NotaController::class, 'edit']);
Route::put('/notas/{id}', [NotaController::class, 'update']);
Route::delete('/notas/{id}', [NotaController::class, 'destroy']);

Route::get('/tarefas', [TarefaController::class, 'index']);
Route::get('/tarefas/create', [TarefaController::class, 'create']);
Route::post('/tarefas', [TarefaController::class, 'store']);
Route::get('/tarefas/{id}/edit', [TarefaController::class, 'edit']);
Route::put('/tarefas/{id}', [TarefaController::class, 'update']);
Route::delete('/tarefas/{id}', [TarefaController::class, 'destroy']);