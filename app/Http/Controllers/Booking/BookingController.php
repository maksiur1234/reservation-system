<?php
namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\StoreBookingRequest;
use App\Http\Services\Booking\BookingServiceInterface;
use App\Models\Service\Service;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingServiceInterface $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function view()
    {
        $userId = Auth::id();
        $bookings = $this->bookingService->getUserBookings($userId);

        return view('booking.index', [
            'madeBookings' => $bookings['made'],
            'receivedBookings' => $bookings['received'],
        ]);
    }

    public function create($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        return view('booking.create', ['service' => $service]);
    }

    public function store(StoreBookingRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id(); 

        $this->bookingService->createBooking($validated);

        return redirect()->route('services')->with('success', 'Service booked successfully!');
    }
}
