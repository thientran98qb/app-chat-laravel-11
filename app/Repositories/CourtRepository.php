<?php

namespace App\Repositories;

use App\Models\Court;

class CourtRepository extends BaseRepository {

    /**
     * @var $model
     */
    protected $model;

    public function __construct(Court $court)
    {
        $this->model = $court;
    }

    public function getAll($date)
    {
        return Court::query()->with(['courtOrders' => function($query) use ($date) {
                return $query->whereDate('ordered_at', $date);
            }, 'courtOrders.courtPrice'])->get();
    }
}
