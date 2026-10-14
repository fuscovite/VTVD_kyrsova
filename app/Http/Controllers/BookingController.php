<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function create(): View
    {
        return view('bookings.create', ['services' => Service::orderBy('title')->get()]);
    }

    public function store(StoreBookingRequest $request): RedirectResponse
    {
        Booking::create($request->validated());

        return to_route('bookings.create')->with('success', 'Заявку прийнято. Майстер зв’яжеться з вами найближчим часом.');
    }
}
