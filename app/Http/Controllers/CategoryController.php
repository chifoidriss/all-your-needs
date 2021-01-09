<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\SuperCategory;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
   
    public function create(){
        $collection=SuperCategory::all();
         return view ('admin.collections.create',compact('collection'));
    }
    
    public function store(Request $request){
        $validateDate=$request->validate([
            'name'=>'required',
            'description'=>'required',
            'supercategory_id'=>'required',
        ]);

        $collection = Collection::create($validateDate);
            
        return redirect('admin/categorie');
    }

    public function index(){

        $recup_collection =   $recup_collection = DB::table('categories')->join('super_categories','super_categories.id','=','categories.super_category_id')->select('categories.*','super_categories.name as namec')->get();

        return view('admin/categorie/index',compact('recup_collection'))->with('i');
    }

    public function edit($id){
        $recup= Category::findOrFail($id);
        $collection=SuperCategory::all();
          
        
        return view('admin.categorie.edit',compact('recup','collection'));
    }
    
    public function update(Request $request, $id){
   
       $validateDate=$request->validate([
          'name'=>'required',
          'description'=>'required',
          'supercategory_id'=>'required',
      ]);

      $collection = Category::findOrFail($id);
      $collection = Category::where($id)->update($validateDate);
        
     return redirect('admin/categorie');


    }

    public function destroy($id){

        $delete=Category::findOrFail($id);
        $delete->delete();
        return redirect ("admin/categorie");
    }

    public function show($id){
        // $data = DB::table('collections')->select('$collection.*')->where('id_$collection','=',$id)->get();
    
        // return view ('collection/detail_$collection',compact('data'));
    }
}
