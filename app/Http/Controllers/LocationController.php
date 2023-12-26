<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";

        confirmDelete($title, $text);

        return view('location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('location.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'unique:locations,name'],
        ]);

        Location::create($request->all());
        toast('Location created successfully!', 'success');
        return redirect()->route('admin.locations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        return view('location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        $this->validate($request, [
            'name' => ['required', 'unique:locations,name,' . $location->id],
        ]);

        $location->update($request->all());
        toast('Location updated successfully!', 'success');
        return redirect()->route('admin.locations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();
        toast('Location deleted successfully!', 'success');
        return redirect()->route('admin.locations.index');
    }
}
