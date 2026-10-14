@extends('layouts.app')

@section('title', 'Вхід адміністратора — СТО Master')

@section('content')
    <section class="container py-5"><div class="row justify-content-center"><div class="col-md-7 col-lg-5"><div class="card border-0 shadow-sm"><div class="card-body p-4 p-lg-5">
        <h1 class="h2">Вхід адміністратора</h1><p class="text-secondary mb-4">Доступ до заявок мають лише авторизовані працівники.</p>
        <form method="POST" action="{{ route('login.store') }}">@csrf
            <div class="mb-3"><label class="form-label" for="email">E-mail</label><input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus>@error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
            <div class="mb-4"><label class="form-label" for="password">Пароль</label><input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" autocomplete="current-password" required>@error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
            <div class="form-check mb-4"><input class="form-check-input" type="checkbox" value="1" name="remember" id="remember"><label class="form-check-label" for="remember">Запам’ятати мене</label></div>
            <button class="btn btn-dark w-100" type="submit">Увійти</button>
        </form>
    </div></div></div></div></section>
@endsection
