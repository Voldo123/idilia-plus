<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Идилия Плюс - Напольные покрытия')</title>
    <meta name="description" content="@yield('description', 'Интернет-магазин напольных покрытий. Ламинат, паркет, линолеум от ведущих производителей.')">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --beige-light: #f5f2e8;
            --beige-medium: #e8dcc0;
            --beige-dark: #d4c4a0;
            --beige-darker: #c4b088;
            --brown-light: #8b7355;
            --brown-dark: #6b5b47;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--beige-light);
            color: #333;
        }

        .navbar {
            background-color: var(--beige-medium) !important;
            border-bottom: 2px solid var(--beige-dark);
        }

        .navbar-brand {
            font-weight: bold;
            color: var(--brown-dark) !important;
            font-size: 1.5rem;
        }

        .nav-link {
            color: var(--brown-light) !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: var(--brown-dark) !important;
        }

        .btn-primary {
            background-color: var(--beige-darker);
            border-color: var(--beige-darker);
            color: #fff;
        }

        .btn-primary:hover {
            background-color: var(--brown-light);
            border-color: var(--brown-light);
        }

        .card {
            border: 1px solid var(--beige-dark);
            background-color: #fff;
        }

        .footer {
            background-color: var(--beige-darker);
            color: #fff;
            margin-top: 50px;
        }

        .product-card {
            transition: transform 0.2s;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .price {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--brown-dark);
        }

        .old-price {
            text-decoration: line-through;
            color: #999;
            font-size: 0.9rem;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--beige-medium), var(--beige-dark));
            padding: 60px 0;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                🏠 Идилия Плюс
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('catalog') }}">Каталог</a>
                    </li>
                </ul>
                
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Войти</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                @if(Auth::user()->isAdmin())
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Админ-панель</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                @endif
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Выйти</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer py-4">
        <div class="container">
            <div class="text-center">
                <p>&copy; {{ date('Y') }} Идилия Плюс. Все права защищены.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
