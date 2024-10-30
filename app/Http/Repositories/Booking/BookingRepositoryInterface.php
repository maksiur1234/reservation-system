<?php
namespace App\Http\Repositories\Booking;

interface BookingRepositoryInterface
{
    public function getMadeBookings($userId);
    public function getReceivedBookings($userId);
    public function create($data);
}