<x-layout-app page-title="Buscar Aluno">
    <x-navbar />

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-6">
            <h3 class="text-center text-dark mb-4">Buscar Aluno</h3>
            @if(session('message'))
                <div class="alert alert-danger">{{ session('message') }}</div>
            @endif

            <form action="{{ route('aluno.buscar') }}" method="GET">
                @csrf
                <div class="form-group">
                    <label for="search" class="form-label text-dark">Aluno</label>
                    <input type="text" id="search" name="search" class="form-control" placeholder="Digite o ID ou nome do aluno" required>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>
    </div>

    <x-logo />
    <x-footer /> 
</x-layout-app>
