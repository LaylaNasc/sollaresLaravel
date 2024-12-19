<?php


use App\Http\Controllers\AutenticController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;




Route::post('/login', [AutenticController::class, 'login'])->name('login');
Route::view('/login', 'auth.login')->name('login.view');
Route::post('/logout', [AutenticController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function(){
    Route::view('/home', 'home');

    //rotas de usuários
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios');
    Route::get('/usuarios/novo-usuario', [UsuarioController::class, 'create'])->name('usuarios.novo-usuario');
    Route::post('/usuarios/criar-usuario', [UsuarioController::class, 'store'])->name('usuarios.criar-usuario');


    //rotas de Pessoa
    Route::get('/pessoas', [PessoaController::class, 'index'])->name('pessoas');
    Route::get('/pessoas/nova-pessoa', [PessoaController::class, 'create'])->name('pessoas.nova-pessoa');
    Route::post('/pessoas/criar-pessoa', [PessoaController::class, 'store'])->name('pessoas.criar-pessoa');

    //rotas de disciplina
    Route::get('/disciplinas', [DisciplinaController::class, 'index'])->name('disciplinas');
    Route::get('/disciplinas/nova-disciplina',[DisciplinaController::class, 'create'])->name('disciplinas.nova-disciplina');
    Route::get('/disciplinas/criar-disciplina',[DisciplinaController::class, 'store'])->name('disciplinas.criar-disciplina');


    //rotas de matricula
    Route::get('/matriculas', [MatriculaController::class, 'index'])->name('matriculas');
    Route::get('/matriculas/nova-matricula', [MatriculaController::class, 'create'])->name('matriculas.nova-matricula');
    Route::get('/matriculas/criar-matricula', [MatriculaController::class, 'store'])->name('matriculas.criar-matricula');
});
