<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Collection;

class CollectionController extends Controller

{

    public function create(){
        return view ('admin.collections.create');
    }


    public function store(Request $request){
        $validateDate=$request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);

        $collection = Collection::create($validateDate);
            
        return redirect('admin/collections');
    }

    public function index(){

        $recup_collection = Collection::all();

        return view('admin/collections/index',compact('recup_collection'))->with('i');
    }

    public function edit($id){
        $recup=Collection::findOrFail($id);
          
        
        return view('admin.collections.edit',compact('recup'));
    }
    
    public function update(Request $request, $id){
   
        $validateDate=$request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);

        $collection = Collection::findOrFail($id);
        $collection->update($validateDate);
            
        return redirect('admin/collections');
    }

    public function destroy($id){

        $delete=Collection::findOrFail($id);
        $delete->delete();
        return redirect ("admin/collections");
    }

    public function show($id){
        // $data = DB::table('collections')->select('$collection.*')->where('id_$collection','=',$id)->get();
    
        // return view ('collection/detail_$collection',compact('data'));
    }
}
