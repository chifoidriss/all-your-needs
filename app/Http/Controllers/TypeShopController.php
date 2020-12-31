<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\TypeShop;

class TypeShopController extends Controller
{
        public function create(Request $request){

      $collection = new TypeShop();
      $collection->name = $request->input('name');
      $collection->description = $request->input('description');

      $collection->save();
        
        return redirect('/indextypeshop');

    }

    public function index(){

        $recup_collection = DB::table('type_shops')->select('type_shops.*')->get();

        return view('type_shop/index',compact('recup_collection'))->with('i');
    }

    public function edit($id){
        $recup=DB::table('type_shops')->select('type_shops.*')->where('id','=',$id)->get();
          
        
        return view('type_shop/edit',compact('recup'));
    }
    
    public function update(Request $request, $id){

        $nom_collection = $request->input('name');
        $sigle = $request->input('description');
        $data = array('name'=>$nom_collection,'description'=>$sigle);
         DB::table('type_shops')->where('id','=',$id)->update($data);
         
        return redirect('/indextypeshop');


    }

    public function destroy($id){

        //$etat="0";
        DB::table('type_shops')->where("id","=",$id)->delete();
        return redirect ("/indextypeshop");
    }

    public function show($id){
        // $data = DB::table('collections')->select('$collection.*')->where('id_$collection','=',$id)->get();
    
        // return view ('collection/detail_$collection',compact('data'));
    }
}
