<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Вебзастосунок для запису на обслуговування автомобіля в СТО Master.">
    <title>@yield('title', 'СТО Master')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">СТО Master</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavigation" aria-controls="mainNavigation" aria-expanded="false" aria-label="Відкрити навігацію">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavigation">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Головна</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}" href="{{ route('services.index') }}">Послуги</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('parts.*') ? 'active' : '' }}" href="{{ route('parts.index') }}">Запчастини</a></li>
                    <li class="nav-item"><a class="btn btn-danger ms-lg-2" href="{{ route('bookings.create') }}">Записатися</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main>@yield('content')</main>

    <footer class="border-top bg-white py-4 mt-auto">
        <div class="container d-flex flex-column flex-sm-row justify-content-between gap-2 small text-secondary">
            <span>© {{ now()->year }} СТО Master. Навчальний проєкт.</span>
            <a class="link-secondary" href="{{ route('login') }}">Вхід для адміністратора</a>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
