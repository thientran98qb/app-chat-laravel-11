<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'level',
        'price',
        'image',
        'description',
        'start_time',
        'end_time',
        'status'
    ];

    public function courtOrders()
    {
        return $this->hasMany(CourtOrder::class);
    }

    public function courtPrices()
    {
        return $this->hasMany(CourtPrice::class);
    }
}
