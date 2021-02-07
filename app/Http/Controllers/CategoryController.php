<?php

namespace App\Http\Controllers;

use App\Events\NotifyEvent;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\SuperCategory;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
   
    public function create(){
        $superCategories = SuperCategory::all();
        $isEdit = false;
        $category = new Category();
        
        return view('admin.categories.create-edit', compact([
            'superCategories',
            'isEdit',
            'category'
        ]));
    }
    
    public function store(Request $request){
        $validateDate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'super_category_id' => 'required',
            'slug' => 'required',
        ]);

        $collection = Category::create($validateDate);
        
        event(new NotifyEvent(__FUNCTION__, 'Category'));

        return redirect('admin/categorie');
    }

    public function index(){
        $categories =   Category::with(['superCategory.collection'])->get();

        return view('admin.categories.index',compact([
            'categories'
        ]));
    }

    public function edit($id){
        $category= Category::findOrFail($id);
        $superCategories = SuperCategory::all();
        $isEdit = true;
        
        return view('admin.categories.create-edit',compact([
            'superCategories',
            'isEdit',
            'category'
        ]));
    }
    
    public function update(Request $request, $id){
        $validateDate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'super_category_id' => 'required',
            'slug' => 'required',
        ]);

        $category = Category::findOrFail($id);
        $category->update($validateDate);

        event(new NotifyEvent(__FUNCTION__, 'Category'));
        
        return redirect('admin/categorie');
    }

    public function destroy($id){
        $delete = Category::findOrFail($id);
        $delete->delete();

        event(new NotifyEvent(__FUNCTION__, 'Category'));

        return redirect ("admin/categorie");
    }
}
