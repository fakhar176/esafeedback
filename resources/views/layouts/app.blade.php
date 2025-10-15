<!doctype html>
<html lang="ur" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ایمرجنسی سروسز اکیڈمی') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            font-family: 'Noto Nastaliq Urdu', 'Segoe UI', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
            min-height: 100vh;
        }

        .navbar {
            background: linear-gradient(to right, #c0392b, #e74c3c) !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand, .nav-link {
            color: white !important;
            font-weight: bold;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            border: none;
        }

        .btn-primary {
            background: linear-gradient(to right, #3498db, #2980b9);
            border: none;
            border-radius: 8px;
        }

        .btn-success {
            background: linear-gradient(to right, #2ecc71, #27ae60);
            border: none;
            border-radius: 8px;
        }

        .btn-warning {
            background: linear-gradient(to right, #e67e22, #d35400);
            border: none;
            border-radius: 8px;
        }
    </style>

    @stack('styles')

</head>
<body>

<div id="app">
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-first-aid me-2"></i>
                ایمرجنسی سروسز اکیڈمی (ریسکیو 1122)
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <i class="fas fa-tachometer-alt me-1"></i>
                                ڈیش بورڈ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('evaluation.form') }}">
                                <i class="fas fa-clipboard-list me-1"></i>
                                تشخیص فارم
                            </a>
                        </li>
                    @endauth
                </ul>

                <ul class="navbar-nav ms-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <i class="fas fa-sign-in-alt me-1"></i>
                                    {{ __('لاگ ان') }}
                                </a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">
                                    <i class="fas fa-user-plus me-1"></i>
                                    {{ __('رجسٹر') }}
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown">
                                <i class="fas fa-user me-1"></i>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt me-1"></i>
                                    {{ __('لاگ آؤٹ') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Chart.js for Dashboard -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- sweetalert2 for Dashboard -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@stack('scripts')
</body>
</html>
