<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $disciplinas = Disciplina::all();
        return view('disciplina.disciplinas', compact('disciplinas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pessoas = Pessoa::all(); 
        return view('disciplina.add-disciplina', compact('pessoas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cargaHoraria' => 'required|integer',
            'limiteAlunos' => 'required|integer', 
            'professor_id' => 'required|exists:pessoas,id',
        ]);
    
        Disciplina::create([
            'nomeDisciplina' => $request->nome,
            'cargaHoraria' => $request->cargaHoraria,
            'limiteAlunos' => $request->limiteAlunos, 
            'professor_id' => $request->professor_id,
        ]);
    
        return redirect()->route('disciplinas');
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
        if(intval($id) === 1){
            return redirect()->route('disciplinas');
        }

        $disciplina = Disciplina::findOrFail($id);
        $pessoas = Pessoa::all();  
        return view('disciplina.edit-disciplina', compact('disciplina', 'pessoas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
    //tenho que alterar esse id ===1
        if (intval($id) === 1) {
            return redirect()->route('disciplinas');
        }

        $disciplina = Disciplina::findOrFail($id);  
        $disciplina->update([
            'nomeDisciplina' => $request->nome,
            'cargaHoraria' => $request->cargaHoraria,
            'limiteAlunos' => $request->limiteAlunos, 
            'professor_id' => $request->professor_id,
        ]);

        return redirect()->route('disciplinas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
