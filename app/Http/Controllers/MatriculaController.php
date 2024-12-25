<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Matricula;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MatriculaController extends Controller
{
 // listar
    public function index()
    {
        $matriculas = Matricula::all();

        foreach ($matriculas as $matricula) {
            $matricula->dataMatricula = \Carbon\Carbon::parse($matricula->dataMatricula)->format('d/m/Y');
            $matricula->valorPago = number_format($matricula->valorPago, 2, ',', '.');
        }
        
    
        return view('matricula.matriculas', compact('matriculas'));
    }

    // apresentar a view
    public function create(): View
    {
        $pessoas = Pessoa::all();
        $disciplinas = Disciplina::all(); 
        return view('matricula.add-matricula', compact('pessoas', 'disciplinas'));
    }

   //criação de matrícula
    public function store(Request $request)
    {
        $request->validate([
            'aluno_id' => 'required|exists:pessoas,id',
            'disciplina_id' => 'required|exists:disciplinas,id', 
            'dataMatricula' => 'required|date',
            'valorPago' => 'required|numeric', 
            'periodo' => 'required|string',
        ]);
        
        // regra sobre limite de alunos 
        $disciplina = Disciplina::findOrFail($request->disciplina_id);
        $numeroDeMatriculas = $disciplina->matriculas()->count();

        if ($disciplina->matriculas()->count() >= $disciplina->limiteAlunos) {
            return redirect()->back()
                ->withErrors(['limiteAlunos' => 'O limite de alunos para esta disciplina foi atingido.'])
                ->withInput();
        }

        Matricula::create([
            'aluno_id' => $request->aluno_id,
            'disciplina_id' => $request->disciplina_id,
            'dataMatricula' => $request->dataMatricula,
            'valorPago' => $request->valorPago,
            'periodo' => $request->periodo,
        ]);       

        return redirect()->route('matriculas');
    }

    //ainda vou criar
    public function show(string $id)
    {
        //
    }

    //apresentar view de edição
    public function edit(string $id)
    {
   
        $matricula = Matricula::findOrFail($id);
        $pessoas = Pessoa::all();  
        $disciplinas = Disciplina::all();  
        return view('matricula.edit-matricula', compact('matricula', 'pessoas', 'disciplinas'));
    }

   //alterando os dados
    public function update(Request $request)
    {
        $id = $request->id;
        
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

   //deletar
    public function destroy(string $id)
    {
        $matricula = Matricula::with('aluno')->findOrFail($id);   

        return view('matricula.delete-matricula-confirm', compact('matricula'));

    }

    public function deleteConfirm(string $id)
    {
        $matricula = Matricula::findOrFail($id);

        $matricula->delete();

        return redirect()->route('matriculas');
    }

    public function apresntarFaturamento()
    {
        //
    }

    public function buscarFaturamento()
    {

    }
}
