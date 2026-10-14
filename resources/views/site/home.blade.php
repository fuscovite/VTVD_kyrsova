@extends('layouts.app')

@section('title', 'СТО Master — автомобільний сервіс')

@section('content')
    <section class="hero py-5 text-white">
        <div class="container py-lg-5">
            <div class="col-lg-8">
                <p class="text-uppercase fw-semibold small mb-3">Автосервіс у вашому місті</p>
                <h1 class="display-5 fw-bold mb-3">Обслуговування автомобіля без зайвих дзвінків</h1>
                <p class="lead mb-4">Оберіть послугу, залиште контакти — і майстер підтвердить зручний час візиту.</p>
                <a class="btn btn-danger btn-lg" href="{{ route('bookings.create') }}">Залишити заявку</a>
            </div>
        </div>
    </section>

    <section class="container py-5">
        <div class="row g-4">
            <div class="col-md-4"><div class="card h-100 border-0 shadow-sm"><div class="card-body"><h2 class="h4">Діагностика</h2><p class="mb-0 text-secondary">Перевіряємо основні системи автомобіля перед ремонтом.</p></div></div></div>
            <div class="col-md-4"><div class="card h-100 border-0 shadow-sm"><div class="card-body"><h2 class="h4">Прозорі ціни</h2><p class="mb-0 text-secondary">Вартість послуг наведено в каталозі до оформлення заявки.</p></div></div></div>
            <div class="col-md-4"><div class="card h-100 border-0 shadow-sm"><div class="card-body"><h2 class="h4">Запчастини</h2><p class="mb-0 text-secondary">У каталозі доступно {{ $partsCount }} OEM-позицій для замовлення.</p></div></div></div>
        </div>
        <div class="mt-5 p-4 p-lg-5 bg-light rounded-4 d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
            <div><h2 class="h3 mb-1">Доступно {{ $servicesCount }} сервісних послуг</h2><p class="mb-0 text-secondary">Перегляньте перелік робіт або одразу залиште заявку.</p></div>
            <a class="btn btn-outline-dark" href="{{ route('services.index') }}">Перейти до послуг</a>
        </div>
    </section>
@endsection
