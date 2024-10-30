<?php
namespace App\Http\Repositories\Booking;

use App\Models\Booking\Booking;
use App\Models\Service\Service;
use Illuminate\Support\Facades\Auth;

class BookingRepository implements BookingRepositoryInterface
{
    public function getMadeBookings($userId)
    {
        return Booking::with('service')->where('user_id', $userId)->get();
    }

    public function getReceivedBookings($userId)
    {
        return Booking::with('service')
            ->where('user_id', '!=', $userId)
            ->whereHas('service', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->get();
    }

    public function create($data)
    {
        return Booking::create($data);
    }

}