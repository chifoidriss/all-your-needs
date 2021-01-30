<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
