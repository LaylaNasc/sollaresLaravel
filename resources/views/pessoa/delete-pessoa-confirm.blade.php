<x-layout-app page-title="Deletar Pessoa">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card w-50 p-4 shadow">
            <h3 class="card-title text-center">Deletar Pessoa</h3>
            <hr>

            @if (isset($errorMessage))
                <div class="alert alert-danger text-center">
                    {{ $errorMessage }}
                </div>
            @else
                <p class="text-center">Tem certeza que deseja deletar essa pessoa?</p>
            @endif
            
            <div class="text-center">
                <h3 class="my-5">{{ $pessoa->nomePessoa }}</h3>
                <a href="{{ route('pessoas') }}" class="btn btn-secondary px-5">Não</a>
                @if (!isset($errorMessage))
                    <a href="{{ route('pessoas.deletar-pessoa-confirme', ['id' => $pessoa->id]) }}" class="btn btn-danger px-5">Sim</a>
                @endif
            </div>
        </div>
    </div>
</x-layout-app>


