<x-layout-app page-title="Editar Disciplina">

    <x-navbar /> 

    <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg" style="width: 100%; max-width: 40rem;">
            <h3 class="text-center">Nova Disciplina</h3>
    
            <form action="{{ route('disciplinas.atualizar-disciplina') }}" class="row g-3 needs-validation" novalidate method="post">
                @method('PUT')
                @csrf
                <input type="hidden" name="id" value="{{ $disciplina->id }}">
                
                <div class="col-md-6">
                    <label for="nome" class="form-label text-dark">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required value="{{ $disciplina->nomeDisciplina }}">
                    @error('nome')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="col-md-6">
                    <label for="cargaHoraria" class="form-label text-dark">Horario</label>
                    <input type="number" class="form-control" id="cargaHoraria" name="cargaHoraria" required value="{{ $disciplina->cargaHoraria }}">
                    @error('cargaHoraria')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="col-md-6">
                    <label for="professor" class="form-label text-dark">Professor</label>
                    <select class="form-select" id="professor" name="professor_id" required>
                        <option selected disabled value="">Selecione...</option>
                        @foreach($pessoas as $pessoa)
                            <option value="{{ $pessoa->id }}" 
                                {{ $pessoa->id == $disciplina->professor_id ? 'selected' : '' }}>
                                {{ $pessoa->nomePessoa }}
                            </option>
                        @endforeach
                    </select>
                    @error('professor_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>          
    
                <div class="col-md-6">
                    <label for="limiteAlunos" class="form-label text-dark">Limite de Alunos</label>
                    <input type="number" class="form-control" id="limiteAlunos" name="limiteAlunos" required value="{{ $disciplina->limiteAlunos }}">
                    @error('limiteAlunos')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>                
    
                <div class="col-md-6 text-end align-self-end">
                    <a href="{{ route('disciplinas') }}" class="btn btn-outline-danger me-3">Cancelar</a>
                    <button class="btn btn-primary" type="submit">Editar</button>
                </div>
            </form>
        </div>
    </div>
    

    <x-logo />
    <x-footer />     

</x-layout-app>
