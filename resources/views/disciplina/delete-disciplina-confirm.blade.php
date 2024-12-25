<x-layout-app page-title="Deletar Disciplina">

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card w-50 p-4 shadow">
            <h3 class="card-title text-center">Deletar Disciplina</h3>
            <hr>
            <p class="text-center">Tem certeza que deseja deletar essa disciplina?</p>
            
            <div class="text-center">
                <h3 class="my-5">{{ $disciplina->nomeDisciplina }}</h3>
                <a href="{{ route('disciplinas') }}" class="btn btn-secondary px-5">Não</a>
                <a href="{{ route('disciplinas.deletar-disciplina-confirme', ['id' => $disciplina->id]) }}" class="btn btn-danger px-5">Sim</a>
            </div>
        </div>
    </div>

</x-layout-app>

