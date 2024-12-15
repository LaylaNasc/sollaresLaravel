<?php

use App\Models\Usuario;
use App\Http\Controllers\AutenticController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){

    try {
        DB::connection()->getPdo();
        echo "conexão feita com sucesso! " . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        die("falhou! Erro:" . $e);
    }
});

Route::get('/login', [AutenticController::class, 'login']);
Route::get('/logout', [AutenticController::class, 'logout']);

Route::get('/admin', function(){
    $admin = Usuario::find(1);
    dd($admin->toArray());
});


Route::view('/home', 'home');
