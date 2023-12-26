<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seats = Seat::with('bus')->paginate(20);
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";

        confirmDelete($title, $text);

        return view('seat.index', compact('seats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buses = Bus::all();
        return view('seat.create', compact('buses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'bus_id' => 'required',
            'name' => 'required',
        ]);

        Seat::create($request->all());
        toast('Seat created successfully!', 'success');
        return redirect()->route('admin.seats.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seat $seat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seat $seat)
    {
        $buses = Bus::all();
        return view('seat.edit', compact('seat', 'buses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seat $seat)
    {
        $this->validate($request, [
            'bus_id' => 'required|exists:buses,id',
            'name' => 'required',
        ]);

        $seat->update($request->all());
        toast('Seat updated successfully!', 'success');
        return redirect()->route('admin.seats.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seat $seat)
    {
        $seat->delete();
        toast('Seat deleted successfully!', 'success');
        return redirect()->route('admin.seats.index');
    }
}
