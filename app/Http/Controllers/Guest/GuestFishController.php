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


    public function show(Request $request, $id, $view = 'guest.fish.show')
    {
        return parent::show($request, $id, $view);
    }
}
