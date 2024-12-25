<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DisciplinaController extends Controller
{
     // listar
    public function index()
    {
        $disciplinas = Disciplina::all();
        return view('disciplina.disciplinas', compact('disciplinas'));
    }

    // apresentar a view
    public function create(): View
    {
        $pessoas = Pessoa::all(); 
        return view('disciplina.add-disciplina', compact('pessoas'));
    }

    //criação
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

    // ainda vou criar
    public function edit(string $id)
    {
       
        $disciplina = Disciplina::findOrFail($id);
        $pessoas = Pessoa::all();  
        return view('disciplina.edit-disciplina', compact('disciplina', 'pessoas'));
    }

     // apresentar view de edição
    public function update(Request $request)
    {
        $id = $request->id;

        $disciplina = Disciplina::findOrFail($id);  
        $disciplina->update([
            'nomeDisciplina' => $request->nome,
            'cargaHoraria' => $request->cargaHoraria,
            'limiteAlunos' => $request->limiteAlunos, 
            'professor_id' => $request->professor_id,
        ]);

        return redirect()->route('disciplinas');
    }

    // deletar
    public function destroy(string $id)
    {
        $disciplina = Disciplina::findOrFail($id);

        return view('disciplina.delete-disciplina-confirm', compact('disciplina'));

    }

    public function deleteConfirm(string $id)
    {
        $disciplina = Disciplina::findOrFail($id);

        $disciplina->delete();

        if ($disciplina->matriculas()->count() > 0) {
            return back()->withErrors(['disciplinas_com_matricula' => 'Não é possível excluir esta disciplina, pois existem matrículas associadas a ela.']);
        }

        return redirect()->route('disciplinas');
    }
}
