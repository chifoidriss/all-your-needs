<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function store($id)
    {
        $shop = Shop::findOrFail($id);
        $follow = Follow::where([
            'user_id' => Auth::id(),
            'shop_id' => $shop->id
        ])->first();

        if ($follow) {
            $follow->delete();

            notify()->error('Follower removed successful.');
        } else {
            Follow::create([
                'user_id' => Auth::id(),
                'shop_id' => $shop->id
            ]);

            notify()->success('Followed successful.');
        }        

        return back();
    }
}
