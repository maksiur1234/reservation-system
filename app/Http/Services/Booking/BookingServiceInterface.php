<?php
namespace App\Http\Services\Booking;

interface BookingServiceInterface
{
    public function getUserBookings($userId);
    public function createBooking($data);
}
