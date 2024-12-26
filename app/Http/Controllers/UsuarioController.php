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
        return view('usuario.index', compact('usuarios'));    }

    //apresentar a view
    public function create(): View
    {
        Gate::authorize('Admin') ?: abort(403, 'Você não tem autorização para criar um novo usuário.');

        return view('usuario.create');
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

        return redirect()->route('usuarios.index');

    }

    // buscar os dados 
    public function show(string $id)
    {
        //não esquecer
    }

  // apresentar view
    public function edit(Usuario $usuario)
    {
        if ($usuario->id === 1) {
            return redirect()->route('usuarios.index');
        }
    
        return view('usuario.edit', compact('usuario'));
    }

    // alterar dados
    public function update(Request $request, Usuario $usuario)
    {

        if ($usuario->id === 1) {
            return redirect()->route('usuarios.index');
        }
    
        $usuario->update([
            'nome'  => $request->nome,
            'cargo' => $request->cargo,
            'login' => $request->login,
            'email' => $request->email,
        ]);
    
        if ($request->filled('password')) {
            $usuario->password = bcrypt($request->password);
            $usuario->save();
        }
    
        return redirect()->route('usuarios.index');
    }

   //só o admin pode deletar usuários
   public function destroy(Usuario $usuario)
   {
       Gate::authorize('Admin') ?: abort(403, 'Você não tem autorização para criar um novo usuário.');
   
       if ($usuario->id === 1) {
           return redirect()->route('usuarios.index');
       }
   
       $usuario->delete();
   
       return redirect()->route('usuarios.index');
   }

   public function deleteConfirm(Usuario $usuario)
   {
       Gate::authorize('Admin') ?: abort(403, 'Você não tem autorização para criar um novo usuário.');
       
       if ($usuario->id === 1) {
           return redirect()->route('usuarios.index');
       }
   
       return view('usuario.delete-usuario-confirm', compact('usuario'));
   }
    
    

}
