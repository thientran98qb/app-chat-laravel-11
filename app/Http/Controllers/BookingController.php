<?php

namespace App\Http\Controllers;

use App\Constants\Court;
use App\Http\Requests\BookingRequest;
use App\Services\Booking\BookingService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookingController extends Controller
{
    public function __construct(public BookingService $bookingService){}

    /**
     * Show schedule booking
     */
    public function showBooking(Request $request)
    {
        $defaultSchedules = Court::SCHEDULES;
        $schedules = $this->bookingService->getScheduleCourt($request->filter_date ?? null);
        return Inertia::render('Booking/Index', ['defaultSchedules' => $defaultSchedules, 'schedules' => $schedules]);
    }

    /**
     * Booking time in court
     * @param BookingRequest $request
     */
    public function booking(BookingRequest $request)
    {
        $this->bookingService->booking($request->bookings);
        return Inertia::location(route('showBooking', ['filter_date' => $request->filter_date]));
    }
}
