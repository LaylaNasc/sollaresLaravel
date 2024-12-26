<x-layout-app page-title="Aluno">
    <x-navbar /> 

    @if(isset($message))
        <p>{{ $message }}</p>
    @else
        <div class="w-100 p-4">
            <h3 class="text-center text-dark">Disciplinas Cursadas</h3>
        
            <table class="table table-light w-75 mx-auto" id="table">
                <thead class="table-light">
                    <tr>
                        <th>Disciplina</th>
                        <th>Professor</th>
                        <th>Turno</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($disciplinas as $disciplina)
                        <tr>
                            <td>{{ $disciplina->nomeDisciplina }}</td>
                            <td>{{ $disciplina->professor->nomePessoa }}</td>
                            <td>                              
                                    <ul>
                                        @foreach($disciplina->matriculas as $matricula)
                                            <li>{{ $matricula->professor->nomePessoa }} ({{ $matricula->periodo }})</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <x-logo />
    <x-footer /> 
</x-layout-app>
