@extends('layouts.app')

@section('title', 'Послуги — СТО Master')

@section('content')
    <section class="container py-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-4"><div><h1 class="mb-2">Послуги</h1><p class="text-secondary mb-0">Оберіть потрібну роботу та залиште заявку онлайн.</p></div><a class="btn btn-danger" href="{{ route('bookings.create') }}">Записатися</a></div>
        <div class="row g-4">
            @forelse ($services as $service)
                <div class="col-md-6 col-lg-4"><article class="card h-100 border-0 shadow-sm"><div class="card-body d-flex flex-column"><h2 class="h4">{{ $service->title }}</h2><p class="text-secondary flex-grow-1">{{ $service->description }}</p><p class="h5 text-danger mb-0">{{ number_format($service->price, 0, ',', ' ') }} грн</p></div></article></div>
            @empty
                <p class="text-secondary">Перелік послуг буде додано найближчим часом.</p>
            @endforelse
        </div>
    </section>
@endsection
