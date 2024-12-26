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

    public function buscarProfessor(Request $request)
    {
        $search = $request->input('search');

        // Verificar se o 'search' é um número (id) ou uma string (nome)
        if (is_numeric($search)) {
            // Se for um ID, verificar se existe uma pessoa associada a uma disciplina como professor
            $professor = Pessoa::whereHas('disciplinasOfertadas', function ($query) use ($search) {
                $query->where('professor_id', $search);
            })->first();
        } else {
            // Se for um nome, procurar na tabela Pessoa associada a disciplina
            $professor = Pessoa::where('nomePessoa', 'like', "%{$search}%")
                ->whereHas('disciplinasOfertadas') // Garante que a pessoa é associada a alguma disciplina
                ->first();
        }

        if ($professor) {
            // Encontrar as disciplinas do professor
            $disciplinas = Disciplina::where('professor_id', $professor->id)
                ->with(['matriculas.aluno'])
                ->get();

            return view('matricula.professor', compact('professor', 'disciplinas'));
        }

        // Caso não seja encontrado professor
        return redirect()->route('professor.buscar.form')
            ->with('message', 'Nome ou ID não corresponde a um professor válido.');
    }


    
    
    public function formBuscarProfessor()
    {
        return view('matricula.buscarProfessor');
    }

    







    public function imprimirDisciplina($id)
    {
        $disciplina = Disciplina::with(['professor', 'matriculas.aluno'])->findOrFail($id);    
        return view('disciplinas.imprimir', compact('disciplina'));
    }


    public function apresntarFaturamento()
    {
        //
    }

    public function buscarFaturamento()
    {

    }
}
