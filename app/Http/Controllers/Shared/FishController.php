<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Models\Fish;
use Illuminate\Http\Request;

class FishController extends Controller
{
    public function index(Request $request, $view)
    {
        $query = Fish::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('english_name', 'like', "%{$search}%")
                ->orWhere('scientific_name', 'like', "%{$search}%")
                ->orWhere('local_name', 'like', "%{$search}%")
                ->orWhere('fishing_ground', 'like', "%{$search}%");
        }

        $fish = $query->paginate(9);
        return view($view, compact('fish'));
    }

    public function show(Request $request, $id, $view)
    {
        $fish = Fish::findOrFail($id);
        return view($view, compact('fish'));
    }


}
