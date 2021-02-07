<?php

namespace App\Http\Controllers;

use App\Events\NotifyEvent;
use Illuminate\Http\Request;
use App\Models\Theme;

class ThemeController extends Controller
{
    public function create(Request $request){
        $theme = new Theme();
        $isEdit = true;

        return view('admin.themes.create', compact([
            'theme',
            'isEdit'
        ]));
    }

    public function store (Request $request){
        $request->validate([
            'name',
            'description',
        ]);
        $theme = new Theme();
        $theme->fill($request->only([
            'name',
            'description',
        ]));
        $theme->save();

        event(new NotifyEvent(__FUNCTION__, 'Theme'));
        
        return back();
    }

    public function index(){
        $themes = Theme::all();

        return view('admin.themes.index',compact([
            'themes'
        ]));
    }

    public function edit($id){
        $theme = Theme::findOrFail($id);
        $isEdit = true;
         
        return view('admin.themes.create-edit', compact([
            'theme',
            'isEdit'
        ]));
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'name',
            'description',
        ]);
        $theme = Theme::findOrFail($id);
        $theme->fill($request->only([
            'name',
            'description',
        ]));
        $theme->save();
        
        event(new NotifyEvent(__FUNCTION__, 'Theme'));

        return redirect('admin/themes');
    }

    public function destroy($id){
        $theme = Theme::findOrFail($id);
        $theme->delete();

        event(new NotifyEvent(__FUNCTION__, 'Theme'));
      
        return redirect ("admin/themes");
    }
}
