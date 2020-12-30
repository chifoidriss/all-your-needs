<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use DB;

class OfferController extends Controller
{
      public function create(Request $request){

      $collection = new Offer();
      $collection->name = $request->input('name');
      $collection->description = $request->input('description');
      $collection->name = $request->input('price');
      $collection->name = $request->input('period');
      $collection->name = $request->input('status');
      $collection->etat = 1;
      $collection->save();
        
        return redirect('/indexoffert');

    }

    public function index(){

        $recup_collection = DB::table('offers')->select('offers.*')->where('id','=',"1")->get();

        return view('offre/index',compact('recup_collection'))->with('i');
    }

    public function edit($id){
        $recup=DB::table('offers')->select('offers.*')->where('id','=',$id)->get();
          
        
        return view('offre/edit',compact('recup'));
    }
    
    public function update(Request $request, $id){

        $nom_collection = $request->input('name');
        $sigle = $request->input('description');
        $price = $request->input('price');
        $period = $request->input('period');
        $status= $request->input('status');
        $etat= 1;
        $data = array('name'=>$nom_collection,'description'=>$sigle,'price'=>$price,'period'=>$period,'status'=>$status,'etat'=>$etat);
         DB::table('offers')->where('id','=',$id)->update($data);
         
        return redirect('/indexoffert');


    }

    public function destroy($id){

        $etat="0";
        DB::table('offers')->where("id","=",$id)->update(['etat'=>$etat]);
        return redirect ("/indexoffert");
    }

    public function show($id){
        // $data = DB::table('collections')->select('$collection.*')->where('id_$collection','=',$id)->get();
    
        // return view ('collection/detail_$collection',compact('data'));
    }
}
