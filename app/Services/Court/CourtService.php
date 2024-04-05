<?php

namespace App\Services\Court;

use App\Repositories\CourtRepository;

class CourtService implements CourtServiceInterface {
    public function __construct(public CourtRepository $courtRepository) {}

    public function getLists()
    {
        return $this->courtRepository->all();
    }
}
