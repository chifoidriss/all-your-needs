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
}
