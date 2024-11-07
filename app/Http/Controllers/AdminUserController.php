<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminUserController extends Controller
{
    public function index()
    {
        // $users = User::with('role')->get(); // Fetch users with their roles
        $users = User::paginate(5); // Adjust the number per page as needed

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }


    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id', // Ensure role_id is required and exists in the roles table
        ]);
    
        // Create the user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id, // Assign role_id here
        ]);
    
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }
    



    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();  // Fetch all roles to display in the dropdown
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id, // Unique email validation except for current user
            'role_id' => 'required|exists:roles,id', // Validate that role_id exists in the roles table
        ]);
    
        // Find the user and update
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;  // Update role_id
    
        // If you want to update the password (optional), you can add this:
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
    
        $user->save();  // Save the updated user
    
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
