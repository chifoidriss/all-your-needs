<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use App\Models\Shop;
use App\Models\SuperCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($collection = null, $superCategory = null, $category = null)
    {
        $categories = Category::whereHas('products')->get();

        $queryProducts = Product::with('categories')->where([
            'approved' => true,
            'status' => true,
        ])->whereHas('shop', function($query) {
            $query->where([
                'status' => true
            ])->whereHas('subscriptions', function($query) {
                $query->where('end', '>=', date('Y-m-d'));
            });
        })->orderByDesc(
            Shop::select('boost')
            ->whereColumn('shop_id', 'shops.id')
            ->orderByDesc('boost')
            ->limit(1)
        );

        if ($collection) {
            $collection = Collection::whereSlug($collection)->first();
            if ($collection) {
                $queryProducts = $queryProducts->whereHas('categories.superCategory.collection', function ($query) use ($collection) {
                    $query->where('collection_id', $collection->id);
                });
            }
        }
        
        if ($superCategory) {
            $superCategory = SuperCategory::whereSlug($superCategory)->first();
            if ($superCategory) {
                $queryProducts = $queryProducts->whereHas('categories.superCategory', function ($query) use ($superCategory) {
                    $query->where('super_Category_id', $superCategory->id);
                });
            }
        }
        
        if ($category) {
            $category = Category::whereSlug($category)->first();
            if ($category) {
                $queryProducts = $queryProducts->whereHas('categories', function ($query) use ($category) {
                    $query->where('category_id', $category->id);
                });
            }
        }

        $products = $queryProducts->latest()->paginate(8);
        
        // dd($products);

        return view('products.index', compact([
            'products',
            'categories',
            'collection',
            'superCategory',
            'category'
        ]));
    }


    public function show($name, $id)
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
