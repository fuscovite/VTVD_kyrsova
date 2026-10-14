@extends('layouts.app')

@section('title', 'Заявки — адмін-панель СТО Master')

@section('content')
    <section class="container py-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4"><div><p class="text-uppercase text-danger fw-semibold small mb-1">Адміністративна панель</p><h1 class="h2 mb-0">Отримані заявки</h1></div><form method="POST" action="{{ route('admin.logout') }}">@csrf<button class="btn btn-outline-dark" type="submit">Вийти</button></form></div>
        <div class="card border-0 shadow-sm overflow-hidden"><div class="table-responsive"><table class="table table-hover align-middle mb-0"><thead class="table-dark"><tr><th scope="col">№</th><th scope="col">Клієнт</th><th scope="col">Телефон</th><th scope="col">Послуга</th><th scope="col">Статус</th><th scope="col">Створено</th></tr></thead><tbody>
            @forelse ($bookings as $booking)
                <tr><td>{{ $booking->id }}</td><td>{{ $booking->client_name }}</td><td><a href="tel:{{ $booking->phone }}">{{ $booking->phone }}</a></td><td>{{ $booking->service->title }}</td><td><span class="badge text-bg-primary">{{ $booking->status }}</span></td><td class="text-nowrap">{{ $booking->created_at->format('d.m.Y H:i') }}</td></tr>
            @empty
                <tr><td colspan="6" class="py-4 text-center text-secondary">Заявок ще немає.</td></tr>
            @endforelse
        </tbody></table></div></div>
        @if ($bookings->hasPages())<div class="mt-4">{{ $bookings->links() }}</div>@endif
    </section>
@endsection
