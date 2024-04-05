<?php

namespace App\Services\Court;

use Illuminate\Database\Eloquent\Collection;

interface CourtServiceInterface {
    /**
     * @return Collection
     */
    public function getLists();
}
