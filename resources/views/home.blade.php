<x-main-layout pageTitle="Home">

  
    @can('Admin')
        <h3 class="text-center my-5 text-dark">Usuário admin</h3>
    @else
        <p>Você não tem permissão para acessar esta página.</p>
    @endcan

</x-main-layout>
