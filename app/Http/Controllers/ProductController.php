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
        $categories = Category::with('superCategory.collection')->whereHas('products')->get();

        // $queryProducts = Product::with(['categories.superCategory.collection', 'shop'])
        // ->where([
        //     'approved' => true,
        //     'status' => true,
        // ])->whereHas('shop', function($query) {
        //     $query->where([
        //         'status' => true
        //     ])->whereHas('subscriptions', function($query) {
        //         $query->where('end', '>=', date('Y-m-d'));
        //     });
        // });

        $queryProducts = Product::with(['categories.superCategory.collection', 'shop'])
        ->where([
            'approved' => true,
            'status' => true,
        ])->whereHas('shop', function($query) {
            $query->where([
                'status' => true
            ])->whereHas('subscriptions', function($query) {
                $query->where('end', '>=', date('Y-m-d H:i:s'));
            });
        })->orderByDesc(
            Shop::select('boost')
            ->whereColumn('shop_id', 'shops.id')
            ->orderByDesc('boost')
            ->limit(1)
        );

        $q = request()->q;

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

        if ($q && strlen($q) >= 2) {
            $queryProducts = $queryProducts->where('name', 'like', "%$q%")
                                            ->orWhere('price', 'like', "%$q%")
                                            ->orWhere('keywords', 'like', "%$q%");
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
