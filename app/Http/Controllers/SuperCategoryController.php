<?php

namespace App\Http\Controllers;

use App\Events\NotifyEvent;
use Illuminate\Http\Request;
use DB;
use App\Models\SuperCategory;
use App\Models\Collection;
class SuperCategoryController extends Controller
{
    public function create(){
        $isEdit = false;
        $superCategory = new SuperCategory();
        $collections = Collection::all();

        return view ('admin.super_category.create-edit', compact([
            'collections',
            'isEdit',
            'superCategory',
        ]));
    }


    public function store(Request $request){
        $validateDate=$request->validate([
            'name'=>'required',
            'description'=>'required',
            'collection_id'=>'required',
            'slug'=>'required',
        ]);

        SuperCategory::create($validateDate);

        event(new NotifyEvent(__FUNCTION__, 'Super Category'));
        
        return redirect('admin/super_cat');
    }

    public function index() {
        $superCategories = SuperCategory::with(['collection'])->get();

        return view('admin.super_category.index', compact('superCategories'));
    }

    public function edit($id){
        $superCategory =  SuperCategory::findOrFail($id);
        $collections = Collection::all();
        $isEdit = true;
        
        return view('admin.super_category.create-edit',compact([
            'superCategory',
            'collections',
            'isEdit',
        ]));
    }
    
    public function update(Request $request, $id){
        $validateDate=$request->validate([
            'name'=>'required',
            'description'=>'required',
            'collection_id'=>'required',
            'slug'=>'required',
        ]);

        $superCategory = SuperCategory::findOrFail($id);
        $superCategory->update($validateDate);

        event(new NotifyEvent(__FUNCTION__, 'Super Category'));
            
        return redirect('admin/super_cat');
    }

    public function destroy($id) {
        $delete=SuperCategory::findOrFail($id);
        $delete->delete();

        event(new NotifyEvent(__FUNCTION__, 'Super Category'));

        return redirect ("admin/super_cat");
    }
}
