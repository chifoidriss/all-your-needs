<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Product;
use App\Models\TypeShop;
use App\Events\NotifyEvent;
use Illuminate\Support\Str;
use App\Models\Subscription;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ShopController extends Controller
{
    public function show()
    {
        $shop = Shop::whereUserId(Auth::id())->firstOrFail();
        $products = Product::whereShopId($shop->id)->count();

        $subscription = Subscription::whereShopId($shop->id)->where('end', '>=', date('Y-m-d'))->first();
        
        return view('vendor.index', compact([
            'shop',
            'products',
            'subscription',
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

        $shop->slug = Str::slug($shop->name);
        $shop->save();

        event(new NotifyEvent(__FUNCTION__, 'Shop'));
        
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
        
        Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                'max:150',
                Rule::unique('shops')->ignore($shop->id),
            ],
            'phone' => [
                'required',
                'string',
                'max:150',
                Rule::unique('shops')->ignore($shop->id),
            ]
        ]);
        
        $shop->fill($request->only([
            'name',
            'type_shop_id',
            'email',
            'url',
            'phone',
            'fax',
            'facebook',
            'twitter',
            'address',
            'city',
            'country',
            'zip',
            'description',
            'phone',
            'type_shop_id'
        ]));

        $shop->slug = Str::slug($shop->name);
        $shop->save();

        event(new NotifyEvent(__FUNCTION__, 'Shop'));
        
        return redirect()->route('shop.show');
    }
    
    
    public function destroy()
    {
        $shop = Shop::whereUserId(Auth::id())->firstOrFail();
        $shop->delete();

        event(new NotifyEvent(__FUNCTION__, 'Shop'));
        
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
        
        if ($request->hasFile('banner')) {
            if ($shop->banner) {
                Storage::disk('public')->delete($shop->banner);
            }
            $banner = $request->file('banner')->store('shops/banner/'.date('F').date('Y'), 'public');
            $shop->banner = $banner;
        }

        $shop->save();

        event(new NotifyEvent('update', 'Shop Images'));

        return back();
    }
}
