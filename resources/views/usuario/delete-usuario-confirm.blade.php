<x-layout-app page-title="Deletar Usuário">

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card w-50 p-4 shadow">
            <h3 class="card-title text-center">Deletar Usuário</h3>
            <hr>
            <p class="text-center">Tem certeza que deseja deletar esse usuário?</p>
            
            <div class="text-center">
                <h3 class="my-5">{{ $usuario->nome }}</h3> 
                <form id="delete-form" action="{{ route('usuarios.destroy', ['usuario' => $usuario->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary px-5">Não</a>
                    <button type="submit" class="btn btn-danger px-5">Sim</button>
                </form>
            </div>
        </div>
    </div>

</x-layout-app>
