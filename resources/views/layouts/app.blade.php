<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Sistema de Gestão</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-dark: #3a56d4;
            --secondary-color: #3f37c9;
            --accent-color: #f72585;
            --light-bg: #f8f9fa;
            --dark-bg: #212529;
            --text-dark: #2b2d42;
            --text-light: #8d99ae;
            --success-color: #4cc9f0;
            --warning-color: #f8961e;
            --danger-color: #ef233c;
            --border-radius: 10px;
            --box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            color: var(--text-dark);
            line-height: 1.6;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, var(--dark-bg), var(--secondary-color));
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            padding: 0.8rem 0;
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 1.3rem;
            letter-spacing: 0.5px;
            color: white !important;
        }

        .navbar-brand i {
            margin-right: 0.5rem;
        }

        .nav-link {
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            transition: var(--transition);
            color: rgba(255, 255, 255, 0.85);
        }

        .nav-link:hover {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .nav-link i {
            margin-right: 0.4rem;
        }

        /* Container principal */
        .container {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--dark-bg), var(--secondary-color));
            color: white;
            padding: 1.5rem 0;
            margin-top: 3rem;
            text-align: center;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .navbar-collapse {
                padding-top: 1rem;
            }

            .nav-link {
                margin: 0.2rem 0;
                padding: 0.5rem 0.75rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-building me-2"></i>Gestão de Empresas
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">
                            <i class="fas fa-users me-1"></i>
                            Usuários
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('empresas.index') }}">
                            <i class="fas fa-building me-1"></i>
                            Empresas
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <div class="container">
            <p class="mb-0">Sistema de Gestão &copy; {{ date('Y') }}</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>