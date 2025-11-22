<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo') - E-commerce Esportivo</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background: #f5f6fa;
        }
        .navbar {
            background: #1e90ff;
        }
        .navbar-brand,
        .nav-link,
        .navbar-text {
            color: #fff !important;
        }
        .card {
            border-radius: 10px;
        }
        footer {
            background: #1e90ff;
            color: #fff;
            padding: 15px;
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">⚽ E-commerce Esportivo</a>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categorias.index') }}">Categorias</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('produtos.index') }}">Produtos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTEÚDO -->
    <div class="container mt-4">
        @yield('conteudo')
    </div>

    <footer>
        <p>E-commerce Esportivo © {{ date('Y') }}</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
