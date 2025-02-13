<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fish;
use Illuminate\Http\Request;

class FishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fish = Fish::all();
        return view('admin.fish.index', compact('fish'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fish.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'scientific_name' => 'required|unique:fish|string|max:255',
            'english_name' => 'required|string|max:255',
            'local_name' => 'required|string|max:255',
            'fishing_ground' => 'required|string|max:255',
        ]);

        Fish::create($request->all());

        return redirect()->route('admin.fish.index')->with('success', 'Fish species added successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Fish $fish)
    {
        return view('admin.fish.show', compact('fish'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fish $fish)
    {
        return view('admin.fish.edit', compact('fish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fish $fish)
    {
        $request->validate([
            'scientific_name' => 'required|string|max:255',
            'english_name' => 'required|string|max:255',
            'local_name' => 'required|string|max:255',
            'fishing_ground' => 'required|string|max:255',
        ]);

        $fish->update($request->all());

        return redirect()->route('admin.fish.index')->with('success', 'Fish species updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fish $fish)
    {
        $fish->delete();

        return redirect()->route('admin.fish.index')->with('success', 'Fish species deleted successfully.');
    }
}
