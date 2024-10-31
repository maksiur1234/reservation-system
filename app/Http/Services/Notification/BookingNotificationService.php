<?php
namespace App\Http\Services\Notification;

use App\Http\Services\Notification\BookingNotificationServiceInterface;
use App\Mail\BookingNotificationMail;
use App\Models\Service\Service;
use Illuminate\Support\Facades\Mail;

class BookingNotificationService implements BookingNotificationServiceInterface
{
    public function sendBookingNotification($data)
    {
        $service = Service::findOrFail($data['service_id']);
        $serviceOwner = $service->user;

        Mail::to($serviceOwner->email)->send(new BookingNotificationMail([
            'booking_date' => $data['booking_date'],
        ]));
    }
}
