<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Theme;

class ThemeController extends Controller
{
     public function create(Request $request){

      $collection = new Theme();
      $collection->name = $request->input('name');
      $collection->description = $request->input('description');

      $collection->save();
        
        return redirect('/indextheme');

    }

    public function index(){

        $recup_collection = DB::table('themes')->select('themes.*')->get();

        return view('themes/index',compact('recup_collection'))->with('i');
    }

    public function edit($id){
        $recup=DB::table('themes')->select('themes.*')->where('id','=',$id)->get();
          
        
        return view('themes/edit',compact('recup'));
    }
    
    public function update(Request $request, $id){

        $nom_collection = $request->input('name');
        $sigle = $request->input('description');
        $data = array('name'=>$nom_collection,'description'=>$sigle);
         DB::table('themes')->where('id','=',$id)->update($data);
         
        return redirect('/indextheme');


    }

    public function destroy($id){

        //$etat="0";
        DB::table('themes')->where("id","=",$id)->delete();
        return redirect ("/indextheme");
    }

    public function show($id){
        // $data = DB::table('collections')->select('$collection.*')->where('id_$collection','=',$id)->get();
    
        // return view ('collection/detail_$collection',compact('data'));
    }
}
