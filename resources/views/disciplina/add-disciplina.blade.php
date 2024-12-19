<x-layout-app page-title="Nova Disciplina">

    <x-navbar /> 

    <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg" style="width: 100%; max-width: 40rem;">
            <h3 class="text-center">Nova Disciplina</h3>

            <form action="{{ route('disciplinas.criar-disciplina') }}" class="row g-3 needs-validation" novalidate method="post">
                @csrf

                <div class="col-md-6">
                    <label for="nome" class="form-label text-dark">Nome da Disciplina</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                    @error('nome')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="int" class="form-label text-dark">Horario</label>
                    <input type="int" class="form-control" id="int" name="int" required>
                    @error('cargaHoraria')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="text" class="form-label text-dark">Professor</label>
                    <select class="form-select" id="text" name="text" required>
                        <option selected disabled value="">Selecione...</option>                        
                    </select>
                    @error('professor')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="int" class="form-label text-dark">Limite de Alunos</label>
                    <input type="int" class="form-control" id="int" name="int" required>
                    @error('limite')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 text-end align-self-end">
                    <a href="{{ route('disciplinas') }}" class="btn btn-outline-danger me-3">Cancelar</a>
                    <button class="btn btn-primary" type="submit">Nova Disciplina</button>
                </div>

            </form>
        </div>
    </div>

    <x-logo />
    <x-footer />     

</x-layout-app>

