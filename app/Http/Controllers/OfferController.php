<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use DB;

class OfferController extends Controller
{

      public function create(){
          return view('admin/offre.create');
      }
      public function store(Request $request){
            $validate=$request->validate([
                'name'  => 'required',
                'description'  => 'required',
                'price'  => 'required',
                'period'  => 'required',
                'status'  => 'required',
            ]);
            $collection=Offer::create($validate);
                
             return redirect('admin/offre');

    }

    public function index(){

            $recup_collection = Offer::all();

            return view('admin.offre.index',compact('recup_collection'))->with('i');
    }

    public function edit($id){
        //$recup=DB::table('offers')->select('offers.*')->where('id','=',$id)->get();
             $recup=Offer::findOrfail($id);
        
        return view('admin.offre.edit',compact('recup'));
    }
    
    public function update(Request $request, $id){

         $validate=$request->validate([
                'name'  => 'required',
                'description'  => 'required',
                'price'  => 'required',
                'period'  => 'required',
                'status'  => 'required',
            ]);
           
            Offer::whereId($id)->update($validate);
         
        return redirect('admin/offre');


    }

    public function destroy($id){

       $delete=Offer::findOrFail($id);
       $delete->delete();
        return redirect ("admin/offre");
    }

    public function show($id){
        // $data = DB::table('collections')->select('$collection.*')->where('id_$collection','=',$id)->get();
    
        // return view ('collection/detail_$collection',compact('data'));
    }
}
