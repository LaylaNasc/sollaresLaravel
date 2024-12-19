<x-layout-app page-title="Disciplina">

    <div class="w-100 p-4">

        <h3>Disciplina</h3>
    
        <hr>       
        <div class="mb-3">
            <a href="{{ route('disciplinas.nova-disciplina') }}" class="btn btn-primary">Criar uma nova disciplina</a>
        </div>  
        <table class="table w-50" id="table">
            <thead class="table-dark">
                <th>Disciplina</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($disciplinas as $disciplina)
                    <tr>
                        <td>{{ $disciplina->nomeDisciplina }}</td>
                        <td>
                            <div class="d-flex gap-3 justify-content-end">
                                <a href="#" class="btn btn-sm btn-outline-dark">
                                    <i class="fa-regular fa-pen-to-square me-2"></i>Editar
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-dark">
                                    <i class="fa-regular fa-trash-can me-2"></i>Deletar
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
   
    </div>

</x-layout-app>
