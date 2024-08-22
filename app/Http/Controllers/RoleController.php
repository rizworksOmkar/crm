<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function view(){
        $roles = Role::all();
        return view('admin.masters.role-type.role-master-index', compact('roles'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'role_type' => 'required|string|max:255',
        ]);

        Role::create([
            'role_type' => $request->role_type,
            'state_role_type'=> 1
        ]);

        return redirect()->back()->with('success', 'Role created successfully!');
    }
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('get-all-roles')->with('success', 'Property Type deleted successfully!');
    }
}
