<?php

namespace App\Repositories;

use App\Models\CourtOrder;

class CourtOrderRepository extends BaseRepository {

    /**
     * @var $model
     */
    protected $model;

    public function __construct(CourtOrder $courtOrder)
    {
        $this->model = $courtOrder;
    }

    public function createMany($data)
    {
        return CourtOrder::insert($data);
    }
}
