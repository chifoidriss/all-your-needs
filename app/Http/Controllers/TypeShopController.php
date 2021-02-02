<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\TypeShop;

class TypeShopController extends Controller
{
    public function create() {
        return view('admin.type-shop.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
        $collection = new TypeShop();
        $collection->fill($request->only([
            'name',
            'description']));

        $collection->save();
            
        return redirect('admin/type-shop');

    }

    public function index(){

        // $recup_collection = DB::table('type_shops')->select('type_shops.*')->get();
        $recup_collection = TypeShop::all();

        return view('admin.type-shop.index', compact('recup_collection'))->with('i');
    }

    public function edit($id){
        $recup=DB::table('type_shops')->select('type_shops.*')->where('id','=',$id)->get();
          
        
        return view('admin.type-shop.edit',compact('recup'));
    }
    
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
        $collection = TypeShop::findOrFail($id);
        $collection->fill($request->only([
            'name',
            'description']));

        $collection->save();
        return redirect('admin/type-shop');


    }

    public function destroy($id){

        //$etat="0";
     $delete= TypeShop::findOrFail($id);
      $delete->delete();
        return redirect ("admin/type-shop");
    }

    public function show($id){
        // $data = DB::table('collections')->select('$collection.*')->where('id_$collection','=',$id)->get();
    
        // return view ('collection/detail_$collection',compact('data'));
    }
}
