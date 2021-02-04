<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Devise;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        // $categories = Category::whereHas('products')->get();
        // $collections = Collection::whereHas('superCategories.categories.products')->get();
        $categories = Category::get();
        $collections = Collection::get();
        $queryProducts = Product::with(['categories.superCategory.collection', 'shop'])
        ->where([
            'approved' => true,
            'status' => true,
        ])->whereHas('shop', function($query) {
            $query->where([
                'status' => true
            ])->whereHas('subscriptions', function($query) {
                $query->where('end', '>=', date('Y-m-d'));
            });
        });

        $products = $queryProducts->orderBy('created_at', 'DESC')->limit(10)->get();
        
        $bestSellers = $queryProducts->reorder()->orderByDesc(
            Shop::select('boost')
            ->whereColumn('shop_id', 'shops.id')
            ->orderByDesc('boost')
            ->limit(1)
        )->whereHas('shop', function ($query)
        {
            $query->where('boost','>=',20);
        })
        ->orderBy('created_at', 'DESC')->limit(10)->get();

        return view('index', compact([
            'products',
            'bestSellers',
            'collections',
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
