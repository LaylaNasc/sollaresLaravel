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

Route::post('/login', [AutenticController::class, 'login'])->name('login');
Route::view('/login', 'auth.login')->name('login.view');
// Route::get('/logout', [AutenticController::class, 'logout']);



Route::middleware('auth')->group(function(){
    Route::view('/home', 'home');
});
