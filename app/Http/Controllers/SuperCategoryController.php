<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\SuperCategory;
use App\Models\Collection;
class SuperCategoryController extends Controller
{
    public function create(){
        $collection=Collection::all();
         return view ('admin.collections.create',compact('collection'));
     }
     public function store(Request $request){
      $validateDate=$request->validate([
          'name'=>'required',
          'description'=>'required',
          'collection_id'=>'required',
      ]);

      $collection = Collection::create($validateDate);
        
        return redirect('admin/super_cat');

    }

    public function index(){

        $recup_collection = DB::table('super_categories')->join('collections','collections.id','=','super_categories.collection_id')->select('super_categories.*','collections.name as namec')->get();

        return view('admin/super_cat/index',compact('recup_collection'))->with('i');
    }

    public function edit($id){
        $recup= SuperCategory::findOrFail($id);
        $collection=Collection::all();
          
        
        return view('admin.super_cat.edit',compact('recup','collection'));
    }
    
    public function update(Request $request, $id){
   
       $validateDate=$request->validate([
          'name'=>'required',
          'description'=>'required',
          'collection_id'=>'required',
      ]);

      $collection = SuperCategory::findOrFail($id);
      $collection = SuperCategory::where($id)->update($validateDate);
        
     return redirect('admin/super_cat');


    }

    public function destroy($id){

        $delete=SuperCategory::findOrFail($id);
        $delete->delete();
        return redirect ("admin/super_cat");
    }

    public function show($id){
        // $data = DB::table('collections')->select('$collection.*')->where('id_$collection','=',$id)->get();
    
        // return view ('collection/detail_$collection',compact('data'));
    }
}
