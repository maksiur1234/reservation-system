<?php
namespace App\Http\Services\Notification;

interface BookingNotificationServiceInterface
{
    public function sendBookingNotification(array $data);
}
