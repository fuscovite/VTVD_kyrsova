@extends('layouts.app')

@section('title', 'Онлайн-запис — СТО Master')

@section('content')
    <section class="container py-5"><div class="row justify-content-center"><div class="col-lg-7">
        <div class="card border-0 shadow-sm"><div class="card-body p-4 p-lg-5"><h1 class="h2">Онлайн-запис на сервіс</h1><p class="text-secondary mb-4">Заповніть форму — адміністратор підтвердить час візиту телефоном.</p>
            @if (session('success'))<div class="alert alert-success" role="alert">{{ session('success') }}</div>@endif
            <form method="POST" action="{{ route('bookings.store') }}" novalidate>@csrf
                <div class="mb-3"><label class="form-label" for="client_name">Ваше ім’я</label><input class="form-control @error('client_name') is-invalid @enderror" id="client_name" name="client_name" value="{{ old('client_name') }}" autocomplete="name" required><div class="invalid-feedback">@error('client_name'){{ $message }}@else Вкажіть ім’я. @enderror</div></div>
                <div class="mb-3"><label class="form-label" for="phone">Номер телефону</label><input class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+380XXXXXXXXX" inputmode="tel" autocomplete="tel" required><div class="invalid-feedback">@error('phone'){{ $message }}@else Вкажіть номер у форматі +380XXXXXXXXX. @enderror</div></div>
                <div class="mb-4"><label class="form-label" for="service_id">Послуга</label><select class="form-select @error('service_id') is-invalid @enderror" id="service_id" name="service_id" required><option value="">Оберіть послугу</option>@foreach ($services as $service)<option value="{{ $service->id }}" @selected(old('service_id') == $service->id)>{{ $service->title }} — {{ number_format($service->price, 0, ',', ' ') }} грн</option>@endforeach</select><div class="invalid-feedback">@error('service_id'){{ $message }}@else Оберіть послугу. @enderror</div></div>
                <button class="btn btn-danger w-100" type="submit">Надіслати заявку</button>
            </form>
        </div></div>
    </div></div></section>
@endsection
