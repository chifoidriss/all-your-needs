<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use App\Models\Shop;
use App\Models\SuperCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop = Shop::whereUserId(Auth::id())->firstOrFail();
        $products = Product::whereShopId($shop->id)->paginate(10);
        return view('vendor.products.index', compact([
            'products'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $isEdit = false;
        $collections = Collection::all();
        $product = new Product();
        return view('vendor.products.create-edit', compact([
            'isEdit',
            'collections',
            'product'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'old_price' => 'nullable|numeric',
            'qty' => 'required|numeric',
            'category' => 'required|array',
            'image' => 'required|image',
            'images.*' => 'nullable|image',
        ]);

        $shop = Shop::whereUserId(Auth::id())->firstOrFail();

        $product = new Product();
        $product->fill($request->only([
            'name',
            'description',
            'price',
            'old_price',
            'qty'
        ]));
        $product->shop_id = $shop->id;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('products/image/'.date('F').date('Y'), 'public');
        }
        $product->image = $image;
        $product->save();

        $product->categories()->attach($request->category);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('products/images/'.date('F').date('Y'), 'public');

                $product->galleries()->create([
                    'image' => $path
                ]);
            }
        }

        return redirect()->route('shop.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = Shop::whereUserId(Auth::id())->firstOrFail();
        $product = Product::where([
            'id' => $id,
            'shop_id' => $shop->id
        ])->firstOrFail();
        
        return view('vendor.products.show', compact([
            'product'
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $isEdit = true;
        $shop = Shop::whereUserId(Auth::id())->firstOrFail();
        $collections = Collection::all();
        $product = Product::where([
            'id' => $id,
            'shop_id' => $shop->id
        ])->firstOrFail();
        
        return view('vendor.products.create-edit', compact([
            'collections',
            'product',
            'isEdit'
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'old_price' => 'nullable|numeric',
            'qty' => 'required|numeric',
            'category' => 'nullable|array',
            'image' => 'nullable|image',
            'images.*' => 'nullable|image',
        ]);

        $shop = Shop::whereUserId(Auth::id())->firstOrFail();
        $product = Product::where([
            'id' => $id,
            'shop_id' => $shop->id
        ])->firstOrFail();

        $product->fill($request->only([
            'name',
            'description',
            'price',
            'old_price',
            'qty'
        ]));
        
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $image = $request->file('image')->store('products/image/'.date('F').date('Y'), 'public');
            $product->image = $image;
        }
        $product->save();

        if ($request->has('category')) {
            $product->categories()->sync($request->category);
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('products/images/'.date('F').date('Y'), 'public');

                $product->galleries()->create([
                    'image' => $path
                ]);
            }
        }

        return redirect()->route('shop.product.index');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::whereUserId(Auth::id())->firstOrFail();
        $product = Product::where([
            'id' => $id,
            'shop_id' => $shop->id
        ])->firstOrFail();

        $product->delete();

        return back();
    }
    
    
    public function collection($id)
    {
        return SuperCategory::whereCollectionId($id)->get();
    }
    
    public function category($id)
    {
        return Category::whereSuperCategoryId($id)->get();
    }
}
