<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FishFamily;
use Illuminate\Http\Request;

class AdminFishFamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.fish-family.index', [
            'fishFamilies' => FishFamily::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fish-family.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:fish_families|string|max:255',
            'description' => 'string|max:255',
        ]);

        FishFamily::create($request->all());

        return redirect()->route('admin.fish-family.index')->with('success', 'Fish family added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FishFamily $fishFamily)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FishFamily $fishFamily)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FishFamily $fishFamily)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FishFamily $fishFamily)
    {
        $fishFamily->delete();

        return redirect()->route('admin.fish-family.index')->with('success', 'Fish family deleted successfully.');

    }
}
