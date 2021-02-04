<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Collection;
use Illuminate\Support\Facades\Storage;

class CollectionController extends Controller
{

    public function create(){
        $isEdit = false;
        $collection = new Collection();

        return view ('admin.collections.create-edit', compact([
            'collection',
            'isEdit'
        ]));
    }


    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'slug'=>'required',
            'image' => 'required|image|max:100'
        ]);

        $collection = new Collection();
        $collection->fill($request->only([
            'name',
            'description',
            'slug'
        ]));

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('collections', 'public');
            $collection->image = $image;
        }

        $collection->save();
            
        return redirect('admin/collections');
    }

    public function index(){
        $collections = Collection::all();

        return view('admin/collections/index',compact([
            'collections'
        ]));
    }

    public function edit($id){
        $isEdit = true;
        $collection = Collection::findOrFail($id);
        
        return view('admin.collections.create-edit',compact([
            'collection',
            'isEdit'
        ]));
    }
    
    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'slug'=>'required',
            'image' => 'nullable|image|max:100'
        ]);

        $collection = Collection::findOrFail($id);
        $collection->fill($request->only([
            'name',
            'description',
            'slug'
        ]));

        if ($request->hasFile('image')) {
            if ($collection->image) {
                Storage::disk('public')->delete($collection->image);
            }
            $image = $request->file('image')->store('collections', 'public');
            $collection->image = $image;
        }

        $collection->save();
            
        return redirect('admin/collections');
    }

    public function destroy($id){
        $collection = Collection::findOrFail($id);

        if ($collection->image) {
            Storage::disk('public')->delete($collection->image);
        }

        $collection->delete();
        return redirect ("admin/collections");
    }
}
