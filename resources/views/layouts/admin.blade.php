<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Home')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Debugbar CSS -->
    @if(config('debugbar.enabled'))
        {!! Debugbar::renderHead() !!}
    @endif

    @stack('styles')
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <aside class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
            <h3 class="text-center">Ecommerce Esportivo</h3>
            <ul class="nav flex-column mt-4">
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">Sobre</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="{{ route('admin.produtos.index') }}">Produtos</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="{{ route('admin.categorias.index') }}">Categorias</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="{{ route('admin.clientes.index') }}">Clientes</a>
                </li>
                <!-- Adicione outros links conforme necessário -->
            </ul>
        </aside>

        <!-- Conteúdo principal -->
        <div class="flex-grow-1">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <span class="navbar-brand">Ecommerce Esportivo</span>
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sair
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container-fluid mt-4">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Debugbar JS -->
    @if(config('debugbar.enabled'))
        {!! Debugbar::render() !!}
    @endif

    @stack('scripts')

    {{-- SweetAlerts Globais --}}
@if (session('sucesso'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Sucesso!',
    text: "{{ session('sucesso') }}",
    timer: 2500,
    showConfirmButton: false
});
</script>
@endif

@if (session('erro'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Erro!',
    text: "{{ session('erro') }}",
});
</script>
@endif

</body>
</html>
