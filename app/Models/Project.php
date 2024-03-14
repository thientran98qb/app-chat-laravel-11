<?php

namespace App\Models;

use App\Models\Traits\CaptureActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    use CaptureActivity;

    /**
     * @var string[]
     */
    protected $fillable = [
        'uuid',
        'user_id',
        'name',
        'brief_description',
        'current_step',
        'disabled'
    ];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Str::uuid()->toString();
        });
    }
}
