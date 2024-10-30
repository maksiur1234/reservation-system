<?php
namespace App\Http\Services\Booking;

use App\Http\Repositories\Booking\BookingRepositoryInterface;
use App\Http\Services\Booking\BookingServiceInterface;

class BookingService implements BookingServiceInterface
{
    protected $bookingRepository;

    public function __construct(BookingRepositoryInterface $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function getUserBookings($userId)
    {
        return [
            'made' => $this->bookingRepository->getMadeBookings($userId),
            'received' => $this->bookingRepository->getReceivedBookings($userId),
        ];
    }

    public function createBooking($data)
    {
        return $this->bookingRepository->create($data);
    }
}
