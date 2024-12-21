<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pessoas = Pessoa::all();
        return view('pessoa.pessoas', compact('pessoas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pessoa.add-pessoa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomePessoa' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'uf' => 'required|string|size:2',
            'telefone' => 'required|string|regex:/^\(\d{2}\)\s?\d{4,5}-?\d{4}$/',
            'cpf' => 'required|string|size:14|unique:pessoas,cpf',
            'email' => 'required|string|email|max:255|unique:pessoas,email',
        ]);

        Pessoa::create([
            'nomePessoa' => $request->nomePessoa,
            'endereco' => $request->endereco,
            'uf' => $request->uf,
            'telefone' => $request->telefone,
            'cpf' => $request->cpf,
            'email' => $request->email,
        ]);
    
        return redirect()->route('pessoas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * apresentar view
     */
    public function edit(string $id)
    {
        if(intval($id) === 1){
            return redirect()->route('pessoas');
        }

        $pessoa = Pessoa::findOrFail($id);  
        return view('pessoa.edit-pessoa', compact('pessoa'));  
    }
    /**
     * editar
     */
    public function update(Request $request)
    {

    $id = $request->id;
    //tenho que alterar esse id ===1
    if (intval($id) === 1) {
        return redirect()->route('pessoas');
    }

    $pessoa = Pessoa::findOrFail($id);
    $pessoa->update([
        'nomePessoa' => $request->nomePessoa,
        'email' => $request->email,
        'telefone' => $request->telefone,
        'endereco' => $request->endereco,               
        'cpf' => $request->cpf,
        'uf' => $request->uf,
    ]);

    return redirect()->route('pessoas');

    }

    /**
     * deletar
     */
    public function destroy(string $id)
    {
        //
    }
}
