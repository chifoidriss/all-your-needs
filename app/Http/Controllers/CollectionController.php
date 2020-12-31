<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Collection;

class CollectionController extends Controller
{
     public function create(Request $request){

      $collection = new collection();
      $collection->name = $request->input('name');
      $collection->description = $request->input('description');
      $collection->etat = 1;
      $collection->save();
        
        return redirect('/indexcollec');

    }

    public function index(){

        $recup_collection = DB::table('collections')->select('collections.*')->Where('etat','=',"1")->get();

        return view('collections/index',compact('recup_collection'))->with('i');
    }

    public function edit($id){
        $recup=DB::table('collections')->select('collections.*')->where('id','=',$id)->get();
          
        
        return view('collections/edit',compact('recup'));
    }
    
    public function update(Request $request, $id){

        $nom_collection = $request->input('name');
        $sigle = $request->input('description');
        $etat = 1;

        $data = array('name'=>$nom_collection,'description'=>$sigle,'etat'=>$etat);
         DB::table('collections')->where('id','=',$id)->update($data);
         
        return redirect('/indexcollec');


    }

    public function destroy($id){

        $etat="0";
        DB::table('collections')->where("id","=",$id)->update(['etat'=>$etat]);
        return redirect ("/indexcollec");
    }

    public function show($id){
        // $data = DB::table('collections')->select('$collection.*')->where('id_$collection','=',$id)->get();
    
        // return view ('collection/detail_$collection',compact('data'));
    }
}
