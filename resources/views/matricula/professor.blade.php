<x-layout-app page-title="Professor">
    <x-navbar /> 

    <div class="w-100 p-4">
        <h3 class="text-center text-dark">Professor Encontrado</h3>

        @if(session('message'))
            <div class="alert alert-danger">{{ session('message') }}</div>
        @endif

        @if($professor)
            <div class="card mb-4">
                <div class="card-body">
                    <h4>Informações do Professor</h4>
                    <p><strong>Nome:</strong> {{ $professor->nomePessoa }}</p>
                    <p><strong>Endereço:</strong> {{ $professor->endereco }}</p>
                    <p><strong>UF:</strong> {{ $professor->uf }}</p>
                    <p><strong>Telefone:</strong> {{ $professor->telefone }}</p>
                    <p><strong>CPF:</strong> {{ $professor->cpf }}</p>
                    <p><strong>Email:</strong> {{ $professor->email }}</p>
                </div>
            </div>

            <h4 class="text-center text-dark">Disciplinas Ministradas</h4>
            <table class="table table-light w-75 mx-auto" id="table">
                <thead class="table-light">
                    <tr>
                        <th>Disciplina</th>
                        <th>Alunos Matriculados</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($disciplinas as $disciplina)
                        <tr>
                            <td>{{ $disciplina->nomeDisciplina }}</td>
                            <td>
                                @if($disciplina->matriculas->isEmpty())
                                    Nenhum aluno matriculado
                                @else
                                    <ul>
                                        @foreach($disciplina->matriculas as $matricula)
                                            <li>{{ $matricula->aluno->nomePessoa }} ({{ $matricula->periodo }})</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
        @endif
    </div>

    <x-logo />
    <x-footer /> 
</x-layout-app>


    