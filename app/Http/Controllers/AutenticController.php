<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutenticController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'senha' => 'required|string',
        ]);

        if (Auth::attempt(['login' => $request->login, 'password' => $request->senha])) {
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'login' => 'Credenciais inválidas.',
        ])->withInput($request->except('senha'));
    }
}
