<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Models\Fish;
use App\Models\FishFamily;
use Illuminate\Http\Request;

class FishController extends Controller
{
    public function index(Request $request, $view)
    {
        $query = Fish::query();
        $fishFamilies = FishFamily::all(); // Fetch all fish families for the dropdown

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('english_name', 'like', "%{$search}%")
                ->orWhere('scientific_name', 'like', "%{$search}%")
                ->orWhere('local_name', 'like', "%{$search}%")
                ->orWhere('fishing_ground', 'like', "%{$search}%");
        }

        if ($request->has('fish_family_id') && $request->fish_family_id != '') {
            $query->where('fish_family_id', $request->fish_family_id);
            // dd($request->fish_family_id);
        }

        $fish = $query->paginate(9);
        return view($view, compact('fish', 'fishFamilies'));
    }

    public function show(Request $request, $id, $view)
    {
        $fish = Fish::findOrFail($id);
        return view($view, compact('fish'));
    }


}
