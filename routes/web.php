<?php

use App\Models\Usuario;
use App\Http\Controllers\AutenticController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;




Route::post('/login', [AutenticController::class, 'login'])->name('login');
Route::view('/login', 'auth.login')->name('login.view');
Route::post('/logout', [AutenticController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function(){
    Route::view('/home', 'home');
});
