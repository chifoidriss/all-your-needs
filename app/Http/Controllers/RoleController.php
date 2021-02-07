<?php

namespace App\Http\Controllers;

use App\Events\NotifyEvent;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function create() {
        $role = new Role();
        $isEdit = false;
        
        return view('admin.roles.create-edit', compact([
            'role',
            'isEdit'
        ]));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
        $collection = new Role();
        $collection->fill($request->only([
            'name',
            'description']
        ));

        $collection->save();

        event(new NotifyEvent(__FUNCTION__, 'Role'));

        return redirect()->route('admin.role.index');
    }

    public function index() {
        $roles = Role::all();

        return view('admin.roles.index', compact([
            'roles'
        ]));
    }

    public function edit($id) {
        $role = Role::findOrFail($id);
        $isEdit = true;

        return view('admin.roles.create-edit',compact([
            'role',
            'isEdit'
        ]));
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $role = Role::findOrFail($id);
        $role->fill($request->only([
            'name',
            'description'
        ]));

        $role->save();

        event(new NotifyEvent(__FUNCTION__, 'Role'));

        return redirect()->route('admin.role.index');
    }

    public function destroy($id) {
        $role = Role::findOrFail($id);
        $role->delete();

        event(new NotifyEvent(__FUNCTION__, 'Role'));
        
        return redirect()->route('admin.role.index');
    }
}
