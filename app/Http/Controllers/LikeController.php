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
            notify()->error('Product removed from liked successful.');
        } else {
            Like::create([
                'user_id' => Auth::id(),
                'product_id' => $id
            ]);
            notify()->success('Product liked successful.');
        }

        return back();
    }
}
