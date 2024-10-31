<?php
namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Booking\BookingRepository;
use App\Http\Requests\Booking\StoreBookingRequest;
use App\Http\Services\Booking\BookingServiceInterface;
use App\Mail\BookingNotificationMail;
use App\Models\Service\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    protected $bookingService;
    protected $bookingRepository;

    public function __construct(
        BookingServiceInterface $bookingService,
        BookingRepository $bookingRepository
        )
    {
        $this->bookingService = $bookingService;
        $this->bookingRepository = $bookingRepository;
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
    
        $this->bookingService->create($validated);
    
        return redirect()->route('services')->with('success', 'Service booked successfully!');
    }
    
    public function accept($bookingId)
    {
        $this->bookingRepository->accept($bookingId);
        return redirect()->back()->with('success', 'Booking approved successfully!');
    }

    public function reject($bookingId)
    {
        $this->bookingRepository->reject($bookingId);
        return redirect()->back()->with('success', 'Booking approved successfully!');
    }
}
