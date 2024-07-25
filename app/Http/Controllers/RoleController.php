<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'role_type' => 'required|string|max:255',
        ]);

        Role::create([
            'role_type' => $request->role_type,
        ]);

        return redirect()->back()->with('success', 'Role created successfully!');
    }
}
