<x-layout-guest pageTitle="Recuperar Senha">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-5">
    
                <div class="card p-5">

                    @if (!session('status'))
    
                        <div class="text-center mb-5">
                            <img src="{{ asset('assets/images/sollaresLogo.png') }}" alt="Logo" width="200px">
                        </div>
        
                        <p>Para recuperar a sua senha, por favor indique o seu email. Irá receber um email com um link para recuperar a senha.</p>
    
                        <form action="{{ route('password.email') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
        
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('login')}}" class="text-dark">Já sei a minha senha?</a>
                                <button type="submit" class="btn btn-primary px-4">Enviar email</button>
                            </div>
        
                        </form>
                        @else
                            <div class="text-center mb-5">
                                <p>Um email foi enviado com um link para recuperação de senha.</p>
                                <p class="mb-5">Por favor verifique sua caixa de correio.</p>
                                <a href="{{ route('login') }}" class="btn btn-primary px-4">Voltar ao login</a>
                            </div>
                    @endif        
                </div>
    
            </div>
        </div>
    </div>

</x-layout-guest>    