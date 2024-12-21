<x-layout-app page-title="Disciplina">

    <x-navbar /> 

    <div class="w-100 p-4">

        <h3 class="text-center text-dark">Disciplina</h3>
    
        <hr>       
        <div class="d-flex justify-content-start w-75 mx-auto mb-3">
            <a href="{{ route('disciplinas.nova-disciplina') }}" class="btn btn-light">Nova disciplina</a>
        </div>  
        <table class="table table-light w-75 mx-auto" id="table">
            <thead class="table-light">
                <th>Nome</th>
                <th>Carga Horária</th>
                <th>Limite de Alunos</th>
                <th>Professor</th>
                <th class="text-center">Ações</th>
            </thead>
            <tbody>
                @foreach ($disciplinas as $disciplina)
                    <tr>
                        <td>{{ $disciplina->nomeDisciplina }}</td>
                        <td>{{ $disciplina->cargaHoraria }}</td>
                        <td>{{ $disciplina->limiteAlunos }}</td>
                        <td>{{ $disciplina->professor->nomePessoa ?? 'Sem professor' }}</td>

                        <td>
                            <div class="d-flex gap-3 justify-content-end">
                                <a href="{{ route('disciplinas.editar-disciplina', ['id' => $disciplina->id]) }}"  class="text-warning me-3" title="Editar">
                                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                </a>
                                <a href="#" class="text-danger" title="Deletar">
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
