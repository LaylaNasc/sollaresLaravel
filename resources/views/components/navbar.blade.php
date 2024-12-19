<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="#">Sollares</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="{{ route('usuarios') }}">Usuário</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('pessoas') }}">Pessoa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('disciplinas') }}">Disciplina</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Matrícula
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item text-white" href="{{ route('matriculas') }}">Matrícula</a></li>
              <li><a class="dropdown-item text-white" href="#">Aluno</a></li>
              <li><a class="dropdown-item text-white" href="#">Professor</a></li>
              <li><a class="dropdown-item text-white" href="#">Faturamento</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="d-flex align-items-center">
        <i class="fas fa-user-circle me-3"></i>
        <a href="#" class="text-white me-3">
          {{ auth()->user()->nome }}
        </a>

        <form action="{{ route('logout')}}" method="post">
          @csrf
          <button type="submit" class="btn btn-sm btn-danger">
            <i class="fas fa-sign-out-alt">Sair</i>
          </button>
        </form>      
      </div>
    </div>
  </nav>