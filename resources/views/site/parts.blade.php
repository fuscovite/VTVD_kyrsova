@extends('layouts.app')

@section('title', 'Запчастини — СТО Master')

@section('content')
    <section class="container py-5">
        <h1 class="mb-2">OEM-запчастини</h1><p class="text-secondary mb-4">Каталог демонстраційних позицій для обслуговування автомобілів.</p>
        <div class="card border-0 shadow-sm overflow-hidden"><div class="table-responsive"><table class="table table-hover align-middle mb-0"><thead class="table-dark"><tr><th scope="col">OEM-номер</th><th scope="col">Назва</th><th scope="col">Постачальник</th><th scope="col" class="text-end">Ціна</th></tr></thead><tbody>
            @forelse ($parts as $part)
                <tr><td class="fw-semibold">{{ $part->oem_number }}</td><td>{{ $part->name }}</td><td>{{ $part->supplier }}</td><td class="text-end text-nowrap">{{ number_format($part->price, 0, ',', ' ') }} грн</td></tr>
            @empty
                <tr><td colspan="4" class="text-center text-secondary py-4">Позицій ще немає.</td></tr>
            @endforelse
        </tbody></table></div></div>
    </section>
@endsection
