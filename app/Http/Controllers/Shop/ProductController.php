<?php

namespace App\Http\Controllers\Shop;

use App\Events\NotifyEvent;
use App\Models\Shop;
use App\Models\Product;
use App\Models\Category;
use App\Models\Collection;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SuperCategory;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
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
        $order = request()->order ?? 'asc';
        $q = request()->q;
        $filter = request()->filter;
        $per_page = request()->per_page ?? 10;

        $shop = Shop::whereUserId(Auth::id())->firstOrFail();
        $products = Product::whereShopId($shop->id);

        if ($q && strlen($q) >= 2) {
            $products = $products->where('name', 'like', "%$q%");
        }

        if ($filter) {
            $products = $products->orderBy($filter, $order);
        }

        $products = $products->paginate($per_page);
        
        return view('vendor.products.index', compact([
            'products',
            'order',
            'q',
            'filter',
            'per_page',
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
        $collections = Collection::whereHas('superCategories.categories')->get();
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
            'image' => 'required|image|max:200',
            'images.*' => 'nullable|image',
        ]);

        $shop = Shop::whereUserId(Auth::id())->firstOrFail();

        $product = new Product();
        $product->fill($request->only([
            'name',
            'description',
            'keywords',
            'price',
            'old_price',
            'qty'
        ]));
        
        $product->shop_id = $shop->id;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('products/image/'.date('F').date('Y'), 'upload');
            $product->image = $image;
        }
        $product->save();
        $product->slug = $product->id.'-'.Str::slug($product->name);
        $product->save();

        $product->categories()->attach($request->category);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('products/images/'.date('F').date('Y'), 'upload');

                $product->galleries()->create([
                    'image' => $path
                ]);
            }
        }

        event(new NotifyEvent(__FUNCTION__, 'Product'));

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
        $collections = Collection::whereHas('superCategories.categories')->get();
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
            'image' => 'nullable|image|max:200',
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
            'keywords',
            'price',
            'old_price',
            'qty'
        ]));
        
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('upload')->delete($product->image);
            }
            $image = $request->file('image')->store('products/image/'.date('F').date('Y'), 'upload');
            $product->image = $image;
        }

        $product->slug = $product->id.'-'.Str::slug($product->name);
        $product->save();

        if ($request->has('category')) {
            $product->categories()->sync($request->category);
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('products/images/'.date('F').date('Y'), 'upload');

                $product->galleries()->create([
                    'image' => $path
                ]);
            }
        }

        event(new NotifyEvent(__FUNCTION__, 'Product'));

        return redirect()->route('shop.product.index');
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

        event(new NotifyEvent(__FUNCTION__, 'Product'));

        return back();
    }


    public function status($id)
    {
        $shop = Shop::whereUserId(Auth::id())->firstOrFail();
        $product = Product::where([
            'id' => $id,
            'shop_id' => $shop->id
        ])->firstOrFail();

        $product->status = !$product->status;
        $product->save();

        notify()->warning('Status changed successful.', 'Product');

        return back();
    }
    
    
    public function collection($id)
    {
        return SuperCategory::whereCollectionId($id)->whereHas('categories')->get();
    }
    
    public function category($id)
    {
        return Category::whereSuperCategoryId($id)->get();
    }
    
    public function gallery($id, $product)
    {
        $shop = Shop::whereUserId(Auth::id())->firstOrFail();
        
        $product = Product::where([
            'id' => $product,
            'shop_id' => $shop->id
        ])->firstOrFail();

        $gallery = Gallery::where([
            'id' => $id,
            'product_id' => $product->id
        ])->firstOrFail();
        
        Storage::disk('upload')->delete($gallery->image);
        
        $gallery->delete();

        event(new NotifyEvent('destroy', 'Image'));

        return back();
    }
}
