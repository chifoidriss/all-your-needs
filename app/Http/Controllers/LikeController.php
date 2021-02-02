<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    
    public function store($id)
    {
        $like = Like::where([
            'user_id' => Auth::id(),
            'product_id' => $id
        ])->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'user_id' => Auth::id(),
                'product_id' => $id
            ]);
        }

        return back();
    }
}
