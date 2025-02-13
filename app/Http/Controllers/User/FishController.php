<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Fish;
use Illuminate\Http\Request;

class FishController extends Controller
{
    public function index()
    {
        $fish = Fish::all();
        return view('user.fish.index', compact('fish'));
    }
    public function show(Fish $fish)
    {
        return view('user.fish.show', compact('fish'));

    }
}
