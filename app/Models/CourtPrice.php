<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourtPrice extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'court_id',
        'price',
        'time_range'
    ];

    public function courtOrder()
    {
        return $this->belongsTo(CourtOrder::class);
    }
}
