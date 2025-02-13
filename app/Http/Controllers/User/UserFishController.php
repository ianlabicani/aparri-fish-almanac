<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Shared\FishController;
use Illuminate\Http\Request;

class UserFishController extends FishController
{
    public function index(Request $request, $view = 'user.fish.index')
    {
        return parent::index($request, $view);
    }
}
