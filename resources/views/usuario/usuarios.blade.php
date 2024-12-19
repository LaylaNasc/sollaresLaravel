<x-layout-app page-title="Usuarios">

    <div class="w-100 p-4">

        <h3>Usuários</h3>
    
        <hr>

            @if($usuarios->count() === 0)
                <div class="text-center my-5">
                    <p>Usuário não encontrado.</p>
                    <a href="{{ route('usuarios.novo-usuario') }}" class="btn btn-primary">Criar um novo usuário</a>
                </div>
            @else               
                <div class="mb-3">
                    <a href="{{ route('usuarios.novo-usuario') }}" class="btn btn-primary">Criar um novo usuário</a>
                </div>  
                <table class="table w-50" id="table">
                    <thead class="table-dark">
                        <th>Usuário</th>
                        <th></th>
                    </thead>
                    <tbody>

                        @foreach ($usuarios as $usuario)
                            
                        @endforeach
                        <tr>
                            <td>{{ $usuario->nome }}</td>
                            <td>
                                <div class="d-flex gap-3 justify-content-end">
                                    <a href="#" class="btn btn-sm btn-outline-dark"><i class="fa-regular fa-pen-to-square me-2"></i>Editar</a>
                                    <a href="#" class="btn btn-sm btn-outline-dark"><i class="fa-regular fa-trash-can me-2"></i>Deletar</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

            @endif   
    </div>

</x-layout-app>
