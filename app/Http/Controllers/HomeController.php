<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Devise;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $categories = Category::whereHas('products')->get();
        $products = Product::where([
            'approved' => true,
            'status' => true,
        ])->whereHas('shop', function($query) {
            $query->where([
                'status' => true
            ])->whereHas('subscriptions', function($query) {
                $query->where('end', '>=', date('Y-m-d'));
            });
        })->orderBy('created_at', 'DESC')->limit(10)->get();

        // dd($products);
        return view('index', compact([
            'products',
            'categories'
        ]));
    }


    public function contact()
    {
        return view('contact');
    }
    
    
    public function setDevise($devise)
    {
        $exist = Devise::whereName($devise)->first();
    
        if ($exist) {
            // notify()->success('Your favorite language has been changed successful.');
            return back()->withCookie(cookie()->forever('devise', $devise));
        }
        return back();
    }
}
