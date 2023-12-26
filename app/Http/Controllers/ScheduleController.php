<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Schedule;
use App\Models\Trip;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::with('bus', 'trip')->get();
        $title = 'Delete User!';
        $text = 'Are you sure you want to delete?';

        confirmDelete($title, $text);

        return view('schedule.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buses = Bus::where('status', 1)->get();
        $trips = Trip::where('status', 1)->get();

        return view('schedule.create', compact('buses', 'trips'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'bus_id' => 'required',
            'trip_id' => 'required',
            'departure_date' => 'required',
            'fare' => 'required',
        ]);

        Schedule::create($request->all());

        toast('Schedule created successfully', 'success');

        return redirect()->route('admin.schedules.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        $buses = Bus::where('status', 1)->get();
        $trips = Trip::where('status', 1)->get();

        return view('schedule.edit', compact('schedule', 'buses', 'trips'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        $this->validate($request, [
            'bus_id' => 'required',
            'trip_id' => 'required',
            'departure_date' => 'required',
            'fare' => 'required',
        ]);

        $schedule->update($request->all());
        toast('Schedule updated successfully', 'success');

        return redirect()->route('admin.schedules.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        toast('Schedule deleted successfully', 'success');

        return redirect()->route('admin.schedules.index');
    }
}
