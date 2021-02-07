<?php

namespace App\Http\Controllers;

use App\Events\NotifyEvent;
use Illuminate\Http\Request;
use App\Models\Devise;

class DeviseController extends Controller
{
    public function create(){
        $isEdit = false;
        $devise = new Devise();
       
        return view ('admin.devise.create-edit', compact([
            'isEdit',
            'devise',
        ]));
    }


    public function store(Request $request){
        $validateDate=$request->validate([
            'name'=>'required',
            'display_name'=>'required',
            'symbol'=>'required',
            'factor'=>'required',
            'precision'=>'required',
        ]);

        Devise::create($validateDate);
        
        event(new NotifyEvent(__FUNCTION__, 'Currency'));
        
        return redirect('admin/devise');
    }

    public function index() {
        $devises = Devise::all();

        return view('admin.devise.index', compact('devises'));
    }

    public function edit($id){
        $devise =  Devise::findOrFail($id);
        $isEdit = true;
        
        return view('admin.devise.create-edit', compact([
            'devise',
            'isEdit'
        ]));
    }
    
    public function update(Request $request, $id) {
        $validateDate = $request->validate([
            'name'=>'required',
            'display_name'=>'required',
            'symbol'=>'required',
            'factor'=>'required',
            'precision'=>'required',
        ]);
        $devise = Devise::findOrFail($id);
        $devise->update($validateDate);
        
        event(new NotifyEvent(__FUNCTION__, 'Currency'));
        return redirect('admin/devise');
    }

    public function destroy($id) {
        $delete = Devise::findOrFail($id);
        $delete->delete();

        event(new NotifyEvent(__FUNCTION__, 'Currency'));

        return redirect ("admin/devise");
    }

}
