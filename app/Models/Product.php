<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
    
    
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    
    
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }


    public function getRateAttribute()
    {
        if ($this->old_price > 0) {
            $rate = ceil(100 - ($this->price/$this->old_price)*100);
            return '- '.$rate.'%';
        }
        return null;
    }
}
