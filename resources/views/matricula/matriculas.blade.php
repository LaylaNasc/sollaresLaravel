<x-layout-app page-title="Matricula">

    <div class="w-100 p-4">

        <h3>Matricula</h3>
    
        <hr>       
        <div class="mb-3">
            <a href="{{ route('matriculas.nova-matricula') }}" class="btn btn-primary">Criar uma nova matricula</a>
        </div>  
        <table class="table w-50" id="table">
            <thead class="table-dark">
                <th>Pessoas</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($matriculas as $matricula)
                    <tr>
                        <td>{{ $matricula->nomeMatricula }}</td>
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
