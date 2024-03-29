<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
        return ucwords($this->civility.' '.$this->surname . ' ' .$this->name);
    }


    public function shop()
    {
        return $this->hasOne(Shop::class);
    }
    
    
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getIsAdminAttribute()
    {
        if ($this->roles->firstWhere('name','admin')) {
            return true;
        }
        return false;
    }
}
