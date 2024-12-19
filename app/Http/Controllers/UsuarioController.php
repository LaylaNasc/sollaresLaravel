<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class UsuarioController extends Controller
{
    /**
     * listar meus usuários.
     */
    public function index()
    {
        Gate::authorize('Admin') ?: abort(403, 'Você não tem autorização para criar um novo usuário.');
        
        $usuarios = Usuario::all();
        return view('usuario.usuarios', compact('usuarios'));
    }

    /**
     * apresentar a view
     */
    public function create(): View
    {
        Gate::authorize('Admin') ?: abort(403, 'Você não tem autorização para criar um novo usuário.');

        return view('usuario.add-usuario');
    }

    /**
     * submeter o formulario
     */
    public function store(Request $request)
    {
        Gate::authorize('Admin') ?: abort(403, 'Você não tem autorização para criar um novo usuário.');
        $request->validate([
            'nome'  => 'required|string|max:255',
            'cargo' => 'required|string|max:100',
            'login' => 'required|string|max:50|unique:usuarios,login',
            'password' => 'required|string|min:8|confirmed',
            'email' => 'required|email|max:255|unique:usuarios,email',
        ], [
            'required' => 'O campo :attribute é obrigatório.',
            'unique'   => ':attribute já está em uso.',
            'min'      => ':attribute deve ter pelo menos :min caracteres.',
            'confirmed'=> 'A confirmação de :attribute não coincide.',
        ]);

        Usuario::create([
            'nome'  => $request->nome,
            'cargo' => $request->cargo,
            'login' => $request->login,
            'password' => bcrypt($request->senha),  
            'email' => $request->email,
        ]);

        return redirect()->route('usuarios')->with('success', 'Usuário criado com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
