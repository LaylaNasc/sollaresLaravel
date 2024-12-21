<x-layout-app page-title="Editar Pessoa">

    <x-navbar /> 

    <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg" style="width: 100%; max-width: 40rem;">
            <h3 class="text-center">Editar Pessoa</h3>
    
            <form action="{{ route('pessoas.atualizar-pessoa') }}" class="row g-3 needs-validation" novalidate method="post">
                @method('PUT')
                @csrf
                <input type="hidden" name="id" value="{{ $pessoa->id }}">
    
                <div class="col-md-6">
                    <label for="nomePessoa" class="form-label text-dark">Nome</label>
                    <input type="text" class="form-control" id="nomePessoa" name="nomePessoa" required value="{{ $pessoa->nomePessoa }}">
                    @error('nomePessoa')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="col-md-6">
                    <label for="email" class="form-label text-dark">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required value="{{ $pessoa->email }}">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="col-md-6">
                    <label for="telefone" class="form-label text-dark">Telefone</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" required value="{{ $pessoa->telefone }}">
                    @error('telefone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="col-md-6">
                    <label for="cpf" class="form-label text-dark">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" required value="{{ $pessoa->cpf }}">
                    @error('cpf')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="col-md-6">
                    <label for="endereco" class="form-label text-dark">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" required value="{{ $pessoa->endereco }}">
                    @error('endereco')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="col-md-6">
                    <label for="uf" class="form-label text-dark">UF</label>
                    <input type="text" class="form-control" id="uf" name="uf" required value="{{ $pessoa->uf }}">
                    @error('uf')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="col-md-6 text-end align-self-end">
                    <a href="{{ route('pessoas') }}" class="btn btn-outline-danger me-3">Cancelar</a>
                    <button class="btn btn-primary" type="submit">Editar Pessoa</button>
                </div>
    
            </form>
        </div>
    </div>
    

    <x-logo />
    <x-footer />     

</x-layout-app>