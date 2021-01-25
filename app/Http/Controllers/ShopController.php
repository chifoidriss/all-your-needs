<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use App\Models\TypeShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public function show()
    {
        $shop = Shop::whereUserId(Auth::id())->firstOrFail();
        $products = Product::whereShopId($shop->id)->count();
        
        return view('vendor.index', compact([
            'shop',
            'products',
        ]));
    }
    
    
    public function create()
    {
        $shop = Shop::whereUserId(Auth::id())->first();
        if($shop) {
            return redirect()->route('shop.show');
        }

        $shopTypes = TypeShop::all();
        return view('shops.create', compact([
            'shopTypes'
        ]));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:shops',
            'phone' => 'required|string|max:255|unique:shops'
        ]);

        $shop = Shop::whereUserId(Auth::id())->first();
        if($shop) {
            return redirect()->route('shop.show');
        }
        $shop = new Shop();
        $shop->user_id = Auth::id();
        $shop->fill($request->only([
            'name',
            'phone',
            'type_shop_id'
        ]));

        $shop->save();
        
        return redirect()->route('shop.show');
    }

    public function edit()
    {
        $shop = Shop::whereUserId(Auth::id())->firstOrFail();
        $shopTypes = TypeShop::all();
        
        return view('shops.edit', compact([
            'shopTypes',
            'shop'
        ]));
    }


    public function update(Request $request)
    {
        $shop = Shop::whereUserId(Auth::id())->firstOrFail();
        
        $shop->fill($request->only([
            'name',
            'phone',
            'type_shop_id'
        ]));

        $shop->save();
        
        return redirect()->route('shop.show');
    }
    
    
    public function destroy()
    {
        $shop = Shop::whereUserId(Auth::id())->firstOrFail();
        $shop->delete();
        
        return redirect()->route('index');
    }

    

    
    
    public function images(Request $request)
    {
        $shop = Shop::whereUserId(Auth::id())->firstOrFail();
        
        if ($request->hasFile('logo')) {
            if ($shop->logo) {
                Storage::disk('public')->delete($shop->logo);
            }
            $logo = $request->file('logo')->store('shops/logo/'.date('F').date('Y'), 'public');
            $shop->logo = $logo;
        }
        
        if ($request->hasFile('cover')) {
            if ($shop->cover) {
                Storage::disk('public')->delete($shop->cover);
            }
            $cover = $request->file('cover')->store('shops/cover/'.date('F').date('Y'), 'public');
            $shop->cover = $cover;
        }

        $shop->save();

        return back();
    }
}
