<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buses = Bus::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('bus.index', compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Bus::create($request->all());

        toast('Bus Created Successfully', 'success');
        return redirect()->route('admin.buses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bus $bus)
    {
        // Get All Bus With Seats
        $bus = Bus::with('seats')->find($bus->id);
        return view('bus.show', compact('bus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bus $bus)
    {
        return view('bus.edit', compact('bus'));
    }

    /**n
     * Update the specified resource i storage.
     */
    public function update(Request $request, Bus $bus)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $bus->update($request->all());
        toast('Bus Updated Successfully', 'success');
        return redirect()->route('admin.buses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bus $bus)
    {
        $bus->delete();
        alert()->success('SuccessAlert', 'Bus Delete Successfully')->persistent(true, false);
        return redirect()->route('admin.buses.index');
    }
}
