<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class BookingFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_pages_are_available(): void
    {
        $this->get('/')->assertOk();
        $this->get('/services')->assertOk();
        $this->get('/parts')->assertOk();
        $this->get('/booking')->assertOk();
    }

    public function test_valid_booking_is_saved(): void
    {
        $service = Service::query()->create(['title' => 'Діагностика', 'description' => 'Тест', 'price' => 600]);

        $this->post('/booking', [
            'client_name' => 'Кирило Мальцев',
            'phone' => '+380501234567',
            'service_id' => $service->id,
        ])->assertRedirect('/booking');

        $this->assertDatabaseHas('bookings', ['client_name' => 'Кирило Мальцев', 'service_id' => $service->id]);
    }

    public function test_invalid_booking_is_rejected(): void
    {
        $this->post('/booking', ['client_name' => '1', 'phone' => '123', 'service_id' => 999])
            ->assertSessionHasErrors(['client_name', 'phone', 'service_id']);

        $this->assertDatabaseCount('bookings', 0);
    }

    public function test_admin_page_requires_authentication(): void
    {
        $this->get('/admin/bookings')->assertRedirect('/admin/login');
    }

    public function test_authenticated_administrator_can_read_bookings(): void
    {
        $user = User::factory()->create(['password' => Hash::make('password')]);
        $this->actingAs($user)->get('/admin/bookings')->assertOk();
    }
}
