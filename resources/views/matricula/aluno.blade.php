<x-layout-app page-title="Aluno">
    <x-navbar /> 

    <div class="w-100 p-4">
        <h3 class="text-center text-dark">Aluno Encontrado</h3>

        @if(session('message'))
            <div class="alert alert-danger">{{ session('message') }}</div>
        @endif

        @if($aluno)
            <div class="card mb-4">
                <div class="card-body">
                    <h4>Informações do Aluno</h4>
                    <p><strong>Nome:</strong> {{ $aluno->nomePessoa }}</p>
                    <p><strong>Endereço:</strong> {{ $aluno->endereco }}</p>
                    <p><strong>UF:</strong> {{ $aluno->uf }}</p>
                    <p><strong>Telefone:</strong> {{ $aluno->telefone }}</p>
                    <p><strong>CPF:</strong> {{ $aluno->cpf }}</p>
                    <p><strong>Email:</strong> {{ $aluno->email }}</p>
                </div>
            </div>

            <h4 class="text-center text-dark">Disciplinas Matriculadas</h4>
            <table class="table table-light w-75 mx-auto" id="table">
                <thead class="table-light">
                    <tr>
                        <th>Disciplina</th>
                        <th>Valor</th>
                        <th>Período</th>
                        <th>Professor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($disciplinas as $disciplina)
                        <tr>
                            <td>{{ $disciplina->nomeDisciplina }}</td>
                            <td>{{ $disciplina->valor ?? 'Não especificado' }}</td>  <!-- Exibe o valor da disciplina -->
                            <td>{{ $disciplina->matriculas->where('aluno_id', $aluno->id)->first()->periodo ?? 'Não especificado' }}</td>  <!-- Exibe o período da matrícula -->
                            <td>{{ $disciplina->professor->nomePessoa ?? 'Não especificado' }}</td>  <!-- Exibe o nome do professor -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-danger">Aluno não encontrado.</p>
        @endif
    </div>

    <x-logo />
    <x-footer /> 
</x-layout-app>

