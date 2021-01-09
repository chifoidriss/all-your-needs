<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

class Subscription extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
    
    public function getIsActiveAttribute()
    {
        $end = Carbon::createFromFormat('Y-m-d', $this->end);
        $today = Carbon::now();
        if ($today->diffInDays($end, false) >= 0) {
            return true;
        }
        return false;
    }
}
