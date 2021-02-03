<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\TypeShop;

class TypeShopController extends Controller
{
    public function create() {
        $typeShop = new TypeShop();
        $isEdit = false;
        return view('admin.type-shop.create-edit', compact([
            'typeShop',
            'isEdit'
        ]));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
        $collection = new TypeShop();
        $collection->fill($request->only([
            'name',
            'description']
        ));

        $collection->save();
            
        return redirect('admin/type-shop');

    }

    public function index(){
        $typeShops = TypeShop::all();

        return view('admin.type-shop.index', compact([
            'typeShops'
        ]));
    }

    public function edit($id){
        $typeShop = TypeShop::findOrFail($id);
        $isEdit = true;

        return view('admin.type-shop.create-edit',compact([
            'typeShop',
            'isEdit'
        ]));
    }
    
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $typeShop = TypeShop::findOrFail($id);
        $typeShop->fill($request->only([
            'name',
            'description'
        ]));

        $typeShop->save();
        return redirect('admin/type-shop');
    }

    public function destroy($id){
        $typeShop = TypeShop::findOrFail($id);
        $typeShop->delete();
        return redirect ("admin/type-shop");
    }
}
