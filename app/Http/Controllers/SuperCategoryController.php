<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\SuperCategory;
use App\Models\Collection;
class SuperCategoryController extends Controller
{
    public function create(){
        $isEdit = false;
        $superCategory = new SuperCategory();
        $collections = Collection::all();
        return view ('admin.super_category.create-edit', compact([
            'collections',
            'isEdit',
            'superCategory',
        ]));
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

    public function index() {

        // $recup_collection = DB::table('super_categories')->join('collections','collections.id','=','super_categories.collection_id')->select('super_categories.*','collections.name as namec')->get();

        $superCategories = SuperCategory::with(['collection'])->get();

        return view('admin.super_category.index', compact('superCategories'));
    }

    public function edit($id){
        $superCategory =  SuperCategory::findOrFail($id);
        $collections = Collection::all();
        $isEdit = true;
        
        return view('admin.super_category.create-edit',compact([
            'superCategory',
            'collections',
            'isEdit',
        ]));
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
