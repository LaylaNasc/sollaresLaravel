<x-layout-app page-title="Usuarios">

    <x-navbar /> 
        <div class="w-100 p-4">

            <h3 class="text-center text-dark">Usuários</h3>
                      
            @if($usuarios->count() === 0)
                <div class="text-center my-5">
                    <p>Usuário não encontrado.</p>
                    <a href="{{ route('usuarios.novo-usuario') }}" class="btn btn-light">Novo usuário</a>
                </div>
            @else
                <div class="d-flex justify-content-start w-75 mx-auto mb-3">
                    <a href="{{ route('usuarios.novo-usuario') }}" class="btn btn-light">Novo usuário</a>
                </div>  
                <table class="table table-light w-75 mx-auto" id="table">
                    <thead class="table-light">
                        <tr>
                            <th>Nome</th>
                            <th>Cargo</th>
                            <th>Login</th>
                            <th>Email</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->nome }}</td>
                                <td>{{ $usuario->cargo }}</td>
                                <td>{{ $usuario->login }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td class="text-center">
                                    <a href="{{ route('usuarios.editar-usuario', ['id' => $usuario->id]) }}" class="text-warning me-3" title="Editar">
                                        <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                    </a>
                                    <a href="#" class="text-danger" title="Deletar">
                                        <i class="fa-solid fa-trash-can fa-lg"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        
            @endif   
        </div>
    <x-logo />
    <x-footer />  

</x-layout-app>
