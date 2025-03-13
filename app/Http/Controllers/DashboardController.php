<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $users = User::all(); // Fetch all users for admin dashboard
        return view('admin.dashboard', compact('users'));
    }

    public function userDashboard()
    {
        return view('user.dashboard');
    }
    public function index()
{
    $profiles = User::select('id', 'name', 'profile_photo')->get();

    return view('home', compact('profiles'));
}
}
