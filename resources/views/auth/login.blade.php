<x-layout-guest pageTitle="Login">
    <div class="login d-flex align-items-center vh-100">
        <div class="container-fluid p-0">
            <div class="row mx-0 w-100 h-100">

                <!-- Seção do Formulário -->
                <section class="col-md-5 d-flex justify-content-center align-items-center p-0">
                    <div class="card p-5 w-75">
                        <div class="text-center mb-5">
                            <img src="{{ asset('assets/images/sollaresLogo.png') }}" alt="Logo" width="200px">
                        </div>
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="login">Usuário</label>
                                <input type="text" class="form-control" id="login" name="login" value="{{ old('login') }}">
                                @error('login')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="senha">Senha</label>
                                <input type="password" class="form-control" id="senha" name="senha">
                                @error('senha')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <a class="text-dark" href="#">Esqueceu a sua senha?</a>
                                <button type="submit" class="btn btn-primary px-4">Entrar</button>
                            </div>
                        </form>
                    </div>
                </section>

                <!-- Seção da Imagem -->
                <section class="col-md-7 p-0">
                    <img src="{{ asset('assets/images/img-login.png') }}" alt="Imagem" class="img-fluid w-100">
                </section>
            </div>
        </div>
    </div>
</x-layout-guest>
