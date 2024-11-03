<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_booking()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('booking'));

        $response->assertStatus(200);
        $response->assertViewHas(['madeBookings', 'receivedBookings']);
    }
}
