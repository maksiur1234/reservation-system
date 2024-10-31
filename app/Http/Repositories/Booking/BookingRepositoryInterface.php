<?php
namespace App\Http\Repositories\Booking;

interface BookingRepositoryInterface
{
    public function getMadeBookings($userId);
    public function getReceivedBookings($userId);
    public function create($data);
    public function accept($bookingId);
    public function reject($bookingId);
}