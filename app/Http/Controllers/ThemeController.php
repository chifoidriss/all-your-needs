<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Theme;

class ThemeController extends Controller
{
     public function create(Request $request){

      return view ('admin.themes.create');

    }

    public function store (Request $request){
     $request->validate([
         'name',
         'description',
     ]);
      $collection = new Theme();
      $collection->fill($request->only([
          'name',
          'description',
      ]));
      $collection->save();
        
        return back();
    }

    public function index(){

        $recup_collection = Theme::all();

        return view('admin.themes.index',compact('recup_collection'))->with('i');
    }

    public function edit($id){
        $recup=DB::table('themes')->select('themes.*')->where('id','=',$id)->get();
         //$recup=Theme::findOrFail($id);
         
        return view('admin.themes.edit',compact('recup'));
    }
    
    public function update(Request $request, $id){

        $request->validate([
         'name',
         'description',
     ]);
      $collection = Theme::findOrFail($id);
      $collection->fill($request->only([
          'name',
          'description',
      ]));
      $collection->save();
        
         
        return redirect('admin/themes');


    }

    public function destroy($id){

        $delete=Theme::findOrFail($id);
        $delete->delete();
      
        return redirect ("admin/themes");
    }

    public function show($id){
        // $data = DB::table('collections')->select('$collection.*')->where('id_$collection','=',$id)->get();
    
        // return view ('collection/detail_$collection',compact('data'));
    }
}
