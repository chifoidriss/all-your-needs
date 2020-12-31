<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\SuperCategory;

class SuperCategoryController extends Controller
{
       public function create(Request $request){

      $collection = new SuperCategory();
      $collection->name = $request->input('name');
      $collection->description = $request->input('description');
      $collection->collection_id = $request->input('collec');

      $collection->save();
        
        return redirect('/indexsupercat');

    }

    public function index1(){
        $r_collec = DB::table('collections')->select('collections.*')->get();
        
        return view('super_cat/create',compact('r_collec'))->with('i');
    }

    public function index(){

        $recup_collection = DB::table('super_categories')->join('collections','collections.id',"=",'super_categories.id')->select('super_categories.*','collections.name AS namec')->get();
         
        
        return view('super_cat/index',compact('recup_collection'))->with('i');
    }

    public function edit($id){
        $recup=DB::table('super_categories')->select('super_categories.*')->where('id','=',$id)->get();
           $r_collec = DB::table('collections')->select('collections.*')->get();
        
        return view('super_cat/edit',compact('recup','r_collec'));
    }
    
    public function update(Request $request, $id){

        $nom_collection = $request->input('name');
        $sigle = $request->input('description');
        $collec = $request->input('collec');
        $data = array('name'=>$nom_collection,'description'=>$sigle,"collection_id"=>$collec);
         DB::table('super_categories')->where('id','=',$id)->update($data);
         
        return redirect('/indexsupercat');


    }

    public function destroy($id){

        //$etat="0";
        DB::table('super_categories')->where("id","=",$id)->delete();
        return redirect ("/indextypeshop");
    }

    public function show($id){
        // $data = DB::table('collections')->select('$collection.*')->where('id_$collection','=',$id)->get();
    
        // return view ('collection/detail_$collection',compact('data'));
    }
}
