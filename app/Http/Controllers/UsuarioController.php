<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class UsuarioController extends Controller
{
    // listar meus usuários.
    public function index()
    {
                
        $usuarios = Usuario::all();
        $usuarios = Usuario::where('id', '!=', 1)->get(); // os dados do admin não apareceram na tabela
        return view('usuario.usuarios', compact('usuarios'));
    }

    //apresentar a view
    public function create(): View
    {
        Gate::authorize('Admin') ?: abort(403, 'Você não tem autorização para criar um novo usuário.');

        return view('usuario.add-usuario');
    }

   // submeter o formulario
    public function store(Request $request)
    {
        Gate::authorize('Admin') ?: abort(403, 'Você não tem autorização para criar um novo usuário.');
        $request->validate([
            'nome'  => 'required|string|max:255',
            'cargo' => 'required|string|max:100',
            'login' => 'required|string|max:50|unique:usuarios,login',
            'password' => 'required|string|min:8|max:16',
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

        return redirect()->route('usuarios');

    }

    // buscar os dados 
    public function show(string $id)
    {
        //não esquecer
    }

  // apresentar view
    public function edit(string $id)
    {
        if(intval($id) === 1){
            return redirect()->route('usuarios');
        }

        $usuario = Usuario::findOrFail($id);
        return view('usuario.edit-usuario', compact('usuario'));
    }

    // alterar dados
    public function update(Request $request)
    {
        $id = $request->id;

        if (intval($id) === 1) {
            return redirect()->route('usuarios');
        }
    
        $usuario = Usuario::findOrFail($id);
    
        $data = [
            'nome'  => $request->nome,
            'cargo' => $request->cargo,
            'login' => $request->login,
            'email' => $request->email,
        ];
    
        // Verifica se foi enviada uma nova senha
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password); // Re-hasheia a nova senha
        }
    
        $usuario->update($data);
    
        return redirect()->route('usuarios');
    }

   //só o admin pode deletar usuários
    public function destroy(string $id)
    {
        Gate::authorize('Admin') ?: abort(403, 'Você não tem autorização para criar um novo usuário.'); 

        if(intval($id) === 1 ){
            return redirect()->route('usuarios');
        }

        $usuario = Usuario::findOrFail($id);

        return view('usuario.delete-usuario-confirm', compact('usuario'));

    }

    public function deleteConfirm(string $id)
    {
        Gate::authorize('Admin') ?: abort(403, 'Você não tem autorização para criar um novo usuário.'); 

        if(intval($id) === 1 ){
            return redirect()->route('usuarios');
        }

        $usuario = Usuario::findOrFail($id);

        $usuario->delete();

        return redirect()->route('usuarios');

    }
}
