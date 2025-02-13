<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Fish;

class FishController extends Controller
{
    public function index()
    {
        $fish = Fish::all();
        return view('guest.fish.index', compact('fish'));
    }
    public function show(Fish $fish)
    {
        return view('guest.fish.show', compact('fish'));

    }
}
