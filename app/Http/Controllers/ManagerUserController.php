<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\ManagerUser;
class ManagerUserController extends Controller
{
    public function create(){
        $isEdit = false;
        $manageruser = new ManagerUser();
        $users=User::all();
        $roles=Role::all();
        return view ('admin.manager_user.create-edit', compact([
            'isEdit',
            'manageruser',
            'users',
            'roles',
        ]));
    }


    public function store(Request $request){
        $validateDate=$request->validate([
            'user_id'=>'required',
            'role_id'=>'required',
           
        ]);

        $manageruser = ManagerUser::create($validateDate);
        
        return redirect('admin/manager_user');
    }

    public function index() {

        

        $managerusers = ManagerUser::with(['user','role'])->get();

        return view('admin.manager_user.index', compact('managerusers'));
    }

    public function edit($id){
        $manageruser =  ManagerUser::findOrFail($id);
        $isEdit = true;
        $users=User::all();
        $roles=Role::all();
        
        return view('admin.manager_user.create-edit',compact([
            'manageruser',
            'isEdit',
            'users',
            'roles',
        ]));
    }
    
    public function update(Request $request, $id){
   
        $validateDate=$request->validate([
            'user_id'=>'required',
            'role_id'=>'required',
           
        ]);
        $manageruser = ManagerUser::findOrFail($id);
        $manageruser = ManagerUser::where('id','=',$id)->update($validateDate);
            
        return redirect('admin/manager_user');


    }

    public function destroy($id){

        $delete=ManagerUser::findOrFail($id);
        $delete->delete();
        return redirect ("admin/manager_user");
    }
}
