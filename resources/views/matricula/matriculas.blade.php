 <x-layout-app page-title="Matricula">

    <x-navbar /> 

        <div class="w-100 p-4">

            <h3 class="text-center text-dark">Matricula</h3>
        
            <hr>       
            <div class="d-flex justify-content-start w-75 mx-auto mb-3">
                <a href="{{ route('matriculas.nova-matricula') }}" class="btn btn-primary">Nova matrícula</a>
            </div>  
            <table class="table table-light w-75 mx-auto" id="table">
                <thead class="table-ligth">
                    <th>Disciplina</th>
                    <th>Data</th>
                    <th>Valor</th>
                    <th>Aluno</th>
                    <th>Período</th>
                    <th class="text-center">Ações</th>
                </thead>
                <tbody>
                    @foreach ($matriculas as $matricula)
                        <tr>
                            <td>{{ $matricula->disciplina->nomeDisciplina ?? 'Sem disciplina' }}</td>
                            <td>{{ $matricula->dataMatricula }}</td>
                            <td>{{ $matricula->valorPago }}</td>
                            <td>{{ $matricula->aluno->nomePessoa ?? 'Sem aluno'}}</td>
                            <td>{{ $matricula->periodo }}</td>
                            <td>
                                <div class="d-flex gap-3 justify-content-end">
                                    <a href="{{ route('matriculas.editar-matricula', ['id' => $matricula->id]) }}" class="text-warning me-3" title="Editar">
                                        <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                    </a>
                                    <a href="#" class="text-danger" title="Deletar">
                                        <i class="fa-solid fa-trash-can fa-lg"></i>Deletar
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
