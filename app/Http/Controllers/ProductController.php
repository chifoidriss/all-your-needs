<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        return view('products.index', compact([
            'products',
            'categories'
        ]));
    }
}
