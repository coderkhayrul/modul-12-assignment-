<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Order;
use App\Models\Schedule;
use App\Models\Trip;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function installationGuide()
    {
        return view('installation-guide');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home(Request $request)
    {
        $locations = Location::all();
        $trips = Trip::all();
        $resultTrip = [];
        // Request Has Value Check
        if ($request->has('trip') && $request->has('departure')) {
            $this->validate($request, [
                'trip' => 'required',
                'departure' => 'required',
            ]);

            $tripId = $request->trip;
            $departure = $request->departure;

            $resultTrip = Trip::where('id', $tripId)->with(['schedules' => function ($query) use ($departure) {
                $query->where('departure_date', $departure);
            }])->first();

            return view('welcome', compact('locations', 'trips', 'resultTrip', 'tripId', 'departure'));
        }

        return view('welcome', compact('locations', 'trips', 'resultTrip'));
    }

    public function viewSchedule(Schedule $schedule)
    {
        // Auth User Check
        if (! auth()->check()) {
            alert()->error('Error', 'You need to login first!');

            return back();
        }

        $schedule->load(['trip', 'bus', 'bus.seats']);
        $locations = Location::all();
        $orders = Order::where('schedule_id', $schedule->id)->get();
        $orders->load('seat');

        return view('schedule', compact('schedule', 'locations', 'orders'));
    }

    public function ticketBooking(Request $request)
    {
        $this->validate($request, [
            'schedule_id' => 'required',
            'seat_id' => 'required',
            'location_id' => 'required',
        ]);

        $scheduleId = $request->schedule_id;
        $seatId = $request->seat_id;
        $locationId = $request->location_id;

        $schedule = Schedule::find($scheduleId);
        $seat = $schedule->bus->seats->find($seatId);
        $location = Location::find($locationId);

        auth()->user()->orders()->create([
            'schedule_id' => $scheduleId,
            'seat_id' => $seatId,
            'location_id' => $locationId,
        ]);

        alert()->success('Confirm', 'Thanks for booking with us!');

        return response()->json([
            'status' => 'success',
            'message' => 'Order Created Successfully',
        ]);
    }

    public function myTicket()
    {
        // Get All Ticket
        $orders = auth()->user()->orders()->with('schedule', 'seat', 'location', 'user', 'schedule.trip', 'schedule.bus')->get();

        return view('my-ticket', compact('orders'));
    }
}
