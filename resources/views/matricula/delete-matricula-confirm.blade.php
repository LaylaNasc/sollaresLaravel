<x-layout-app page-title="Deletar Matrícula">

    <x-navbar /> 
    
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card w-50 p-4 shadow card-delete">
            <h3 class="card-title text-center">Deletar Matrícula</h3>
            <hr>
            <p class="text-center">Tem certeza que deseja deletar a matrícula do aluno?</p>
            
            <div class="text-center">
                <h3 class="my-5">{{ $matricula->aluno->nomePessoa }}</h3>
                <a href="{{ route('matriculas') }}" class="btn btn-secondary px-5">Não</a>
                <a href="{{ route('matriculas.deletar-matricula-confirme', ['id' => $matricula->id]) }}" class="btn btn-danger px-5">Sim</a>                
            </div>
        </div>
    </div>
    

    <x-logo />
    <x-footer /> 
</x-layout-app>

