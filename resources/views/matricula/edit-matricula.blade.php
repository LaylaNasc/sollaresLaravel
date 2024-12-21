<x-layout-app page-title="Editar Matricula">

    <x-navbar /> 

    <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg" style="width: 100%; max-width: 40rem;">
            <h3 class="text-center">Editar Matricula</h3>

            <form action="{{ route('matriculas.atualizar-matricula') }}" class="row g-3 needs-validation" novalidate method="post">
                @method('PUT')
                @csrf
                <input type="hidden" name="id" value="{{ $matricula->id }}">

                <div class="col-md-6">
                    <label for="disciplina" class="form-label text-dark">Disciplina</label>
                    <select class="form-select" id="disciplina" name="disciplina_id" required>
                        <option selected disabled value="">Selecione...</option>
                        @foreach($disciplinas as $disciplina)
                            <option value="{{ $disciplina->id }}" 
                                {{ $disciplina->id == $matricula->disciplina_id ? 'selected' : '' }}>
                                {{ $disciplina->nomeDisciplina }}
                            </option>
                        @endforeach
                    </select>
                    @error('disciplina_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="date" class="form-label text-dark">Horario</label>
                    <input type="date" class="form-control" id="date" name="dataMatricula" required value="{{ $matricula->dataMatricula }}">
                    @error('dataMatricula')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="aluno" class="form-label text-dark">Aluno</label>
                    <select class="form-select" id="aluno" name="aluno_id" required>
                        <option selected disabled value="">Selecione...</option>
                        @foreach($pessoas as $pessoa)
                            <option value="{{ $pessoa->id }}" 
                                {{ $pessoa->id == $matricula->aluno_id ? 'selected' : '' }}>
                                {{ $pessoa->nomePessoa }}
                            </option>
                        @endforeach                        
                    </select>
                    @error('aluno_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>                
                <div class="col-md-6">
                    <label for="number" class="form-label text-dark">Valor</label>
                    <input type="number" class="form-control" id="valorPago" name="valorPago" required value="{{ $matricula->valorPago }}">
                    @error('limite')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="periodo" class="form-label text-dark">Periodo</label>
                    <select class="form-select" id="periodo" name="periodo" required value="{{ $matricula->periodo }}">
                        <option selected disabled value="">Selecione</option>
                        <option>Matutino</option>
                        <option>Vespertino</option>
                        <option>Noturno</option>
                    </select>
                    @error('periodo')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 text-end align-self-end">
                    <a href="{{ route('matriculas') }}" class="btn btn-outline-danger me-3">Cancelar</a>
                    <button class="btn btn-primary" type="submit">Editar</button>
                </div>

            </form>
        </div>
    </div>

    <x-logo />
    <x-footer />     

</x-layout-app>
