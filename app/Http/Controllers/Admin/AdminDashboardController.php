<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fish;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalFish = Fish::count();
        $totalUsers = User::count();
        return view('admin.dashboard', compact('totalFish', 'totalUsers'));
    }
}
