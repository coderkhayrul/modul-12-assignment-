@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">Welcome To Online Ticket Platform</div>
                    <div class="card-body">
                        <form class="row g-3" method="GET" action="">
                            <div class="col-md-6">
                                <label for="trip" class="form-label">Select Trip <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="fa-solid fa-location-dot"></i></div>
                                    <select name="trip" id="trip" class="form-select" required>
                                        <option selected disabled value="">Select City</option>
                                        @foreach ($trips as $trip)
                                            <option value="{{ $trip->id }}"
                                                {{ isset($tripId) ? ($trip->id == $tripId ? 'selected' : '') : '' }}>
                                                {{ $trip->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('trip')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="departure" class="form-label">Departure Date <span
                                        class="text-danger">*</span></label>
                                <input name="departure" type="date" class="form-control" id="departure"
                                    value="{{ isset($departure) ? $departure : '' }}">
                                @error('departure')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12 text-center mt-5">
                                <button type="submit" class="btn btn-lg btn-success searchNow">Search Now</button>
                            </div>
                        </form>
                    </div>
                    @if ($resultTrip)
                        <div class="card-body mt-4">
                            <div class="card-header">
                                <h4 class="text-center">Available Bus For <span
                                        class="text-danger">{{ $resultTrip->name }}</span></h4>
                            </div>
                            <div class="d-flex flex-column flex-md-row gap-4 align-items-center justify-content-center">
                                <div class="list-group w-100">
                                    @forelse ($resultTrip->schedules as $schedule)
                                        <a href="{{ route('website.schedule.view', $schedule) }}"
                                            class="list-group-item list-group-item-action d-flex gap-3 py-3 my-2"
                                            aria-current="true">
                                            <img src="{{ asset('assets/bus.png') }}" alt="twbs" width="32"
                                                height="32" class="rounded-circle flex-shrink-0">
                                            <div class="d-flex gap-2 w-100 justify-content-between">
                                                <div>
                                                    <h6 class="mb-0">{{ $schedule?->bus?->name ?? 'N/A' }}</h6>
                                                    <p class="mb-0 opacity-75"> DEPARTURE DATE:
                                                        {{ $schedule->departure_date }}
                                                    </p>
                                                </div>
                                                <small class="opacity-50 text-nowrap">{{ '৳' . $schedule->fare }}</small>
                                            </div>
                                        </a>
                                    @empty
                                        <div class="alert alert-danger text-center" role="alert">
                                            No Bus Available
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endsection
