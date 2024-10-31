<?php
namespace App\Http\Services\Booking;

use App\Http\Repositories\Booking\BookingRepositoryInterface;
use App\Http\Services\Booking\BookingServiceInterface;
use App\Http\Services\Notification\BookingNotificationServiceInterface;
use App\Mail\BookingNotificationMail;
use App\Models\Service\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingService implements BookingServiceInterface
{
    protected $bookingRepository;
    protected $notificationService;
    public function __construct(
        BookingRepositoryInterface $bookingRepository,
        BookingNotificationServiceInterface $notificationService
        )
    {
        $this->bookingRepository = $bookingRepository;
        $this->notificationService = $notificationService;
    }

    public function getUserBookings($userId)
    {
        return [
            'made' => $this->bookingRepository->getMadeBookings($userId),
            'received' => $this->bookingRepository->getReceivedBookings($userId),
        ];
    }

    public function create($data)
    {
        $booking =  $this->bookingRepository->create($data);

        $this-> notificationService->sendBookingNotification([
            'booking_date' => $data['booking_date'],
            'service_id' => $data['service_id'],
        ]);

        return $booking;
    }
}
