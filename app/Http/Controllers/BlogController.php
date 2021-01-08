<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Blog;
use App\Models\Theme;
use Illuminate\Support\Facades\Storage;



class BlogController extends Controller

{  

    public function create() {
        return view('admin.blogs.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'status' => 'required',
            'approve' => 'required',
            'image' => 'required',
            
        ]);
        $collection = new Blog();
        
       
        $collection->fill($request->only([
            'name' ,
            'description' ,
            'slug' ,
            'content',
            'status',
            'approved' ,
           
        ]));
       
         $image=$request->file('image');
       // $name = time().'.'.$image->extension();
            // $image->move(public_path().'/images/', $name); 
      
        
        $collection->image = $image;
        $collection->user_id = 1;
        dd($image);
        $collection->save();
            
        return redirect('admin/blogs');

    }

    public function index(){

        // $recup_collection = DB::table('type_shops')->select('type_shops.*')->get();
        $recup_collection = Blog::all();

        return view('admin.blogs.index', compact('recup_collection'))->with('i');
    }

    public function edit($id){
        $recup=DB::table('type_shops')->select('type_shops.*')->where('id','=',$id)->get();
          
        
        return view('admin.type-shop.edit',compact('recup'));
    }
    
    public function update(Request $request, $id){

        $nom_collection = $request->input('name');
        $sigle = $request->input('description');
        $data = array('name'=>$nom_collection,'description'=>$sigle);
         DB::table('type_shops')->where('id','=',$id)->update($data);
         
        return redirect('admin/type-shop');


    }

    public function destroy($id){

        //$etat="0";
        DB::table('type_shops')->where("id","=",$id)->delete();
        return redirect ("admin/type-shop");
    }

    public function show($id){
        // $data = DB::table('collections')->select('$collection.*')->where('id_$collection','=',$id)->get();
    
        // return view ('collection/detail_$collection',compact('data'));
    }
}
