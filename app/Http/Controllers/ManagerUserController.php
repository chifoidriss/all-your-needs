<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
class ManagerUserController extends Controller
{
    public function create() {
        $isEdit = false;
        $user = new User();
        $roles = Role::all();
        
        return view ('admin.manager_user.create-edit', compact([
            'isEdit',
            'user',
            'roles',
        ]));
    }


    public function store(Request $request) {
        $request->validate([
            'email' => 'required',
            'roles_id' => 'required|array',
        ]);

        $user = User::whereEmail($request->email)->firstOrFail();
        $user->roles()->attach($request->roles_id);
        
        return redirect('admin/manager_user');
    }

    public function index() {
        $users = User::whereHas('roles')->with(['roles'])->get();

        return view('admin.manager_user.index', compact([
            'users'
        ]));
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $isEdit = true;
        
        return view('admin.manager_user.create-edit', compact([
            'isEdit',
            'user',
            'roles',
        ]));
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'email'=>'required',
            'roles_id'=>'required|array',
        ]);

        $user = User::whereEmail($request->email)->firstOrFail();
        $user->roles()->sync($request->roles_id);
        
        return redirect('admin/manager_user');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->roles()->sync([]);

        return redirect ("admin/manager_user");
    }
}
