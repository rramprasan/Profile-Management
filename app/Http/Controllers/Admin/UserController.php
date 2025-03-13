<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;

class UserController extends Controller
{
    public function create()
{
    return view('admin.users.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'profile_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'is_admin' => 'required|in:0,1',
    ]);

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->is_admin = $request->is_admin;

    // Profile photo upload
    if ($request->hasFile('profile_photo')) {
        $path = $request->file('profile_photo')->store('profiles', 'public');
        $user->profile_photo = $path;
    }

    $user->save();

    return redirect()->route('admin.dashboard')->with('success', 'User added successfully.');
}

    public function edit($id)
    {
        $user = User::with(['categories', 'subcategories'])->findOrFail($id);
    
        // Add these lines to fetch categories and subcategories
        $categories = Category::all();
        $subcategories = Subcategory::all();
    
        return view('admin.users.edit', compact('user', 'categories', 'subcategories'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'profile_photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'categories' => 'array',
            'subcategories' => 'array',
            'is_admin' => 'required|in:0,1',
        ]);
    
        $user = User::findOrFail($id);
    
        // Update basic user info
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => $request->is_admin,
        ]);
    
        // Handle Profile Photo Upload
        if ($request->hasFile('profile_photo')) {
            $photoPath = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->update(['profile_photo' => $photoPath]);
        }
    
        // Sync categories and subcategories
        $user->categories()->sync($request->categories ?? []);
        $user->subcategories()->sync($request->subcategories ?? []);
    
        return redirect()->route('admin.dashboard')->with('success', 'User updated successfully!');
    }
    
public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully.');
}


}
