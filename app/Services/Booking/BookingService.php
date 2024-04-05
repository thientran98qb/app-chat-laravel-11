<?php

namespace App\Services\Booking;

use App\Constants\Court;
use App\Repositories\CourtOrderRepository;
use App\Repositories\CourtRepository;
use Carbon\Carbon;

class BookingService implements BookingServiceInterface {
    public function __construct(public CourtRepository $courtRepository, public CourtOrderRepository $courtOrderRepository) {}

    /**
     * Get schedule court
     * @return array
     */
    public function getScheduleCourt(?string $filterDate): array
    {
        // Retrieve courts with associated court orders and court prices
        $courts = $this->courtRepository->getAll($filterDate ? Carbon::parse($filterDate) : Carbon::now());

        // Define default schedules
        $defaultSchedules = collect(Court::SCHEDULES);

        // Iterate over courts and check availability for each schedule
        $result = $courts->map(function ($court) use ($defaultSchedules) {
            // Retrieve time ranges for existing court orders
            $existingTimeRanges = $court->courtOrders->pluck('courtPrice.time_range')->toArray();

            // Check availability for each schedule
            return $defaultSchedules->map(function ($schedule) use ($existingTimeRanges, $court) {
                // Check if the schedule exists in existing time ranges
                $courPrice = $court->courtPrices->where('time_range', $schedule)->first();
                if (!$courPrice) return null;
                return [
                    'id' => $courPrice->id,
                    'court_id' => $court->id,
                    'status' => !in_array($schedule, $existingTimeRanges),
                    'time_range' => $schedule,
                    'price' => $courPrice ? $courPrice->price : 0
                ];
            });
        });

        return $result->all();
    }

    public function booking($data)
    {
        return $this->courtOrderRepository->createMany($data);
    }
}
