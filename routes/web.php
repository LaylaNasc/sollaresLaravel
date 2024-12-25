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
    Route::get('/usuarios/editar-usuario/{id}', [UsuarioController::class, 'edit'])->name('usuarios.editar-usuario');
    Route::post('/usuarios/atualizar-usuario', [UsuarioController::class, 'update'])->name('usuarios.atualizar-usuario');
    Route::get('/usuarios/delete-usuario/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.deletar-usuario');
    Route::get('/usuarios/delete-usuario-confirme/{id}', [UsuarioController::class, 'deleteConfirm'])->name('usuarios.deletar-usuario-confirme');


    //rotas de Pessoa
    Route::get('/pessoas', [PessoaController::class, 'index'])->name('pessoas');
    Route::get('/pessoas/nova-pessoa', [PessoaController::class, 'create'])->name('pessoas.nova-pessoa');
    Route::post('/pessoas/criar-pessoa', [PessoaController::class, 'store'])->name('pessoas.criar-pessoa');
    Route::get('/pessoas/editar-pessoa/{id}', [PessoaController::class, 'edit'])->name('pessoas.editar-pessoa');
    Route::put('/pessoas/atualizar-pessoa', [PessoaController::class, 'update'])->name('pessoas.atualizar-pessoa');
    Route::get('/pessoas/delete-pessoa/{id}', [PessoaController::class, 'destroy'])->name('pessoas.deletar-pessoa');
    Route::get('/pessoas/delete-pessoa-confirme/{id}', [PessoaController::class, 'deleteConfirm'])->name('pessoas.deletar-pessoa-confirme');



    //rotas de disciplina
    Route::get('/disciplinas', [DisciplinaController::class, 'index'])->name('disciplinas');
    Route::get('/disciplinas/nova-disciplina',[DisciplinaController::class, 'create'])->name('disciplinas.nova-disciplina');
    Route::post('/disciplinas/criar-disciplina',[DisciplinaController::class, 'store'])->name('disciplinas.criar-disciplina');
    Route::get('/disciplinas/editar-disciplina/{id}', [DisciplinaController::class, 'edit'])->name('disciplinas.editar-disciplina');
    Route::put('/disciplinas/atualizar-disciplina', [DisciplinaController::class, 'update'])->name('disciplinas.atualizar-disciplina');
    Route::get('/disciplinas/delete-disciplina/{id}', [DisciplinaController::class, 'destroy'])->name('disciplinas.deletar-disciplina');
    Route::get('/disciplinas/delete-disciplina-confirme/{id}', [DisciplinaController::class, 'deleteConfirm'])->name('disciplinas.deletar-disciplina-confirme');



    //rotas de matricula
    Route::get('/matriculas', [MatriculaController::class, 'index'])->name('matriculas');
    Route::get('/matriculas/nova-matricula', [MatriculaController::class, 'create'])->name('matriculas.nova-matricula');
    Route::post('/matriculas/criar-matricula', [MatriculaController::class, 'store'])->name('matriculas.criar-matricula');
    Route::get('/matriculas/editar-matricula/{id}', [MatriculaController::class, 'edit'])->name('matriculas.editar-matricula');
    Route::put('/matriculas/atualizar-matricula', [MatriculaController::class, 'update'])->name('matriculas.atualizar-matricula');
    Route::get('matriculas/delete-matricula/{id}', [MatriculaController::class, 'destroy'])->name('matriculas.deletar-matricula');
    Route::get('/matriculas/delete-matricula-confirme/{id}', [MatriculaController::class, 'deleteConfirm'])->name('matriculas.deletar-matricula-confirme');


});
