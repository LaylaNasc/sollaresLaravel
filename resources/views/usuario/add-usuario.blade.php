<x-layout-app page-title="Novo Usuário">

        <x-navbar /> 
    
        <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
            <div class="card p-4 shadow-lg" style="width: 100%; max-width: 40rem;">
                <h3 class="text-center">Novo Usuário</h3>
    
                <form action="{{ route('usuarios.criar-usuario') }}" class="row g-3 needs-validation" novalidate method="post">
                    @csrf
    
                    <div class="col-md-6">
                        <label for="nome" class="form-label text-dark">Nome do Usuário</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                        @error('nome')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="col-md-6">
                        <label for="email" class="form-label text-dark">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="col-md-6">
                        <label for="login" class="form-label text-dark">Login</label>
                        <input type="text" class="form-control" id="login" name="login" required>
                        @error('login')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="col-md-6">
                        <label for="password" class="form-label text-dark">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="text" class="form-label text-dark">Cargo</label>
                        <input type="text" class="form-control" id="cargo" name="cargo" required>
                        @error('cargo')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>   
                    <div class="col-md-6 text-end align-self-end">
                        <a href="{{ route('usuarios') }}" class="btn btn-outline-danger me-3">Cancelar</a>
                        <button class="btn btn-primary" type="submit">Novo usuário</button>
                    </div>
    
                </form>
            </div>
        </div>
    
        <x-logo />
        <x-footer />  
    
</x-layout-app>
