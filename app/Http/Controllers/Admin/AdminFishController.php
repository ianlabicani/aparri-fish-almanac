<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Shared\FishController;
use App\Models\Fish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminFishController extends FishController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $view = 'admin.fish.index')
    {
        return parent::index($request, $view);
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
        $validated = $request->validate([
            'scientific_name' => 'required|unique:fish|string|max:255',
            'english_name' => 'required|string|max:255',
            'local_name' => 'required|string|max:255',
            'fishing_ground' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('fish_images', 'public');
            $validated['image'] = $imagePath;
        }

        Fish::create($validated);

        return redirect()->route('admin.fish.index')->with('success', 'Fish species added successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id, $view = 'admin.fish.show')
    {
        return parent::show($request, $id, $view);
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
        $validated = $request->validate([
            'scientific_name' => 'required|string|max:255',
            'english_name' => 'required|string|max:255',
            'local_name' => 'required|string|max:255',
            'fishing_ground' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($fish->image) {
                Storage::delete('public/' . $fish->image); // Delete old image
            }
            $imagePath = $request->file('image')->store('fish_images', 'public');
            $validated['image'] = $imagePath;
        }
        $fish->update($validated);

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
