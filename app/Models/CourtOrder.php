<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourtOrder extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'court_id',
        'user_id',
        'ordered_at',
        'court_price_id',
        'status'
    ];

    public function courtPrice()
    {
        return $this->belongsTo(CourtPrice::class);
    }
}
