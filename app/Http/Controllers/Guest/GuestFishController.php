<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Shared\FishController;
use App\Models\Fish;
use Illuminate\Http\Request;

class GuestFishController extends FishController
{
    public function index(Request $request, $view = 'guest.fish.index')
    {
        return parent::index($request, $view);
    }

    public function show(Fish $fish)
    {
        return view('guest.fish.show', compact('fish'));

    }
}
