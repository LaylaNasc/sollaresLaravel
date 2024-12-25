<x-layout-app page-title="Pessoas">

    <x-navbar /> 

        <div class="w-100 p-4">

            <h3 class="text-center text-dark">Pessoas</h3>
        
            <div class="d-flex justify-content-start w-75 mx-auto mb-3">
                <a href="{{ route('pessoas.nova-pessoa') }}" class="btn btn-light">Nova pessoa</a>
            </div>  
            <table class="table table-light w-75 mx-auto" id="table">
                <thead class="table-light">
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>UF</th>
                    <th>Telefone</th>
                    <th>CPF</th>
                    <th>Email</th>
                    <th class="text-center">Ações</th>
                </thead>
                <tbody>
                    @foreach ($pessoas as $pessoa)
                        <tr>
                            <td>{{ $pessoa->nomePessoa }}</td>
                            <td>{{ $pessoa->endereco }}</td>
                            <td>{{ $pessoa->uf }}</td>
                            <td>{{ $pessoa->telefone }}</td>
                            <td>{{ $pessoa->cpf }}</td>
                            <td>{{ $pessoa->email }}</td>
                            <td>
                                <div class="d-flex gap-3 justify-content-end">
                                    <a href="{{ route('pessoas.editar-pessoa', ['id' => $pessoa->id]) }}" class="text-warning me-3" title="Editar">
                                        <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                    </a>                                    
                                    <a href="{{ route('pessoas.deletar-pessoa', ['id' => $pessoa->id]) }}"class="text-danger" title="Deletar">
                                        <i class="fa-solid fa-trash-can fa-lg"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    
        </div>
    <x-logo />
    <x-footer />  
</x-layout-app>

