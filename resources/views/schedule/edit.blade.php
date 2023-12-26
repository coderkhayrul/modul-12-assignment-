@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Create A Schedule
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.schedules.update', $schedule) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="bus_id" class="form-label">Bus Name</label>
                                <select name="bus_id" id="bus_id"
                                    class="form-control @error('bus_id') is-invalid @enderror">
                                    <option disabled>Select Bus</option>
                                    @foreach ($buses as $bus)
                                        <option value="{{ $bus->id }}"
                                            {{ $schedule->bus_id == $bus->id ? 'selected' : '' }}>
                                            {{ $bus->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('bus_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="trip_id" class="form-label">Trip Name</label>
                                <select name="trip_id" id="trip_id"
                                    class="form-control @error('trip_id') is-invalid @enderror">
                                    <option selected disabled>Select Trip</option>
                                    @foreach ($trips as $trip)
                                        <option value="{{ $trip->id }}"
                                            {{ $schedule->trip_id == $trip->id ? 'selected' : '' }}>{{ $trip->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('trip_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="departure_date" class="form-label">Departure Date</label>
                                <input type="date" class="form-control @error('departure_date') is-invalid @enderror"
                                    id="departure_date" name="departure_date" value="{{ $schedule->departure_date }}">
                                @error('departure_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="fare" class="form-label">Price</label>
                                <input type="number" class="form-control @error('fare') is-invalid @enderror"
                                    id="fare" name="fare" placeholder="Price" value="{{ $schedule->fare }}">
                                @error('fare')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('admin.schedules.index') }}" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
