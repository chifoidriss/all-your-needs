<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile() {
        return view('user.profile');
    }
    
    public function reviews() {
        return view('user.reviews');
    }
    
    public function messages() {
        return view('user.messages');
    }
    
    public function favorites() {
        return view('user.favorites');
    }
    
    public function updatePassword() {
        return view('user.update-password');
    }
}
