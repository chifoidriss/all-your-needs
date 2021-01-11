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
        $products = Product::with('categories')->where([
            'approved' => true,
            'status' => true,
        ])->whereHas('shop', function($query) {
            $query->where([
                'status' => true
            ])->whereHas('subscriptions', function($query) {
                $query->where('end', '>=', date('Y-m-d'));
            });
        })->orderBy('created_at', 'DESC');

        $products = $products->paginate(8);
        
        // dd($products);
        // dd(Product::with('categories.superCategory')->find(1));

        return view('products.index', compact([
            'products',
            'categories'
        ]));
    }


    public function show($id)
    {
        $product = Product::where([
            'id' => $id,
            'approved' => true,
            'status' => true,
        ])->whereHas('shop', function($query) {
            $query->where([
                'status' => true
            ])->whereHas('subscriptions', function($query) {
                $query->where('end', '>=', date('Y-m-d'));
            });
        })->firstOrFail();


        return view('products.show', compact([
            'product'
        ]));
    }
}
