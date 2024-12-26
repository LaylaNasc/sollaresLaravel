<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Pessoa;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PessoaController extends Controller
{
     // listar
    public function index()
    {
        $pessoas = Pessoa::all();
        return view('pessoa.pessoas', compact('pessoas'));
    }

    // apresntar view
    public function create(): View
    {
        return view('pessoa.add-pessoa');
    }

   //criação
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
    
        $pessoa = Pessoa::findOrFail($id);  
        return view('pessoa.edit-pessoa', compact('pessoa'));  
    }
    /**
     * editar
     */
    public function update(Request $request)
    {

    $id = $request->id;

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
        $pessoa = Pessoa::findOrFail($id);

        return view('pessoa.delete-pessoa-confirm', compact('pessoa'));
    }

    public function deleteConfirm(string $id)
    {
        $pessoa = Pessoa::findOrFail($id);

        try {
            $pessoa->delete();
            return redirect()->route('pessoas')->with('success', 'Pessoa deletada com sucesso.');
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') { // erro de integridade referencial
                $errorMessage = 'Essa pessoa não pode ser deletada porque está vinculada a uma matrícula.';
                return view('pessoa.delete-pessoa-confirm', compact('pessoa', 'errorMessage'));
            }
    
            // Para outros erros
            $errorMessage = 'Ocorreu um erro ao tentar deletar a pessoa.';
            return view('pessoa.delete-pessoa-confirm', compact('pessoa', 'errorMessage'));
    }

    }
    
}
