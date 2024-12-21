<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Matricula;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matriculas = Matricula::all();
        return view('matricula.matriculas', compact('matriculas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pessoas = Pessoa::all();
        $disciplinas = Disciplina::all(); 
        return view('matricula.add-matricula', compact('pessoas', 'disciplinas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'aluno_id' => 'required|exists:pessoas,id',
            'disciplina_id' => 'required|exists:disciplinas,id', 
            'dataMatricula' => 'required|date',
            'valorPago' => 'required|numeric', 
            'periodo' => 'required|string',
        ]);        

        Matricula::create([
            'aluno_id' => $request->aluno_id,
            'disciplina_id' => $request->disciplina_id,
            'dataMatricula' => $request->dataMatricula,
            'valorPago' => $request->valorPago,
            'periodo' => $request->periodo,
        ]);

        return redirect()->route('matriculas');
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
            return redirect()->route('matriculas');
        }

        $matricula = Matricula::findOrFail($id);
        $pessoas = Pessoa::all();  
        $disciplinas = Disciplina::all();  
        return view('matricula.edit-matricula', compact('matricula', 'pessoas', 'disciplinas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        //tenho que alterar esse id ===1
            if (intval($id) === 1) {
                return redirect()->route('matriculas');
            }
        
            $matricula = Matricula::findOrFail($id);  
            $matricula->update([
                'aluno_id' => $request->aluno_id,
                'disciplina_id' => $request->disciplina_id,
                'dataMatricula' => $request->dataMatricula,
                'valorPago' => $request->valorPago,
                'periodo' => $request->periodo,
            ]);
    
            return redirect()->route('matriculas');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
