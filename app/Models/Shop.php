<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
    
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
    
    public function follows()
    {
        return $this->hasMany(Follow::class);
    }
    

    public function type_shop(){
        return $this->belongsTo(TypeShop::class);
    }
}
