@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">Bus Seats Available</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <span class="badge text-bg-primary p-2 my-2 mx-2">
                                    <i class="fa-2x fa-solid fa-chair"></i>
                                </span>
                                Reserved
                                <span class="badge text-bg-secondary p-2 my-2 mx-2">
                                    <i class="fa-2x fa-solid fa-chair"></i>
                                </span>
                                Available
                                <span class="badge text-bg-danger p-2 my-2 mx-2">
                                    <i class="fa-2x fa-solid fa-chair"></i>
                                </span>
                                Booked
                            </div>
                            <hr class="my-1">
                            <div class="col-md-4 mt-3">
                                <!-- Bus Seat Layout -->
                                @foreach ($schedule->bus->seats as $seat)
                                    @foreach ($orders as $order)
                                        @if ($seat->id == $order->seat_id)
                                            <button disabled title="{{ $seat->name }}"
                                                class="btn btn-sm seat btn-danger p-2 m-2">
                                                <i class="fa-2x fa-solid fa-chair"></i>
                                            </button>
                                            @continue(2)
                                        @endif
                                    @endforeach
                                    <button data-id="{{ $seat->id }}" title="{{ $seat->name }}"
                                        class="btn btn-sm seat btn-secondary p-2 m-2">
                                        <i class="fa-2x fa-solid fa-chair"></i>
                                    </button>
                                @endforeach
                            </div>
                            <div class="col-md-8">
                                <!-- Information -->
                                <div class="card">
                                    <div class="card-header bg-primary text-white">
                                        <h4 class="text-center">Trip Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="fw-bold">Trip Name</p>
                                                <p class="fw-bold">Bus Name</p>
                                                <p class="fw-bold">Departure</p>
                                                <p class="fw-bold">Price</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $schedule->trip->name }}</p>
                                                <p>{{ $schedule->bus->name }}</p>
                                                <p>{{ $schedule->departure_date }}</p>
                                                <p>{{ '৳' . $schedule->fare }}</p>
                                            </div>
                                        </div>
                                        <div class="form-control">
                                            <label for="dropLocation">Drop Location <span
                                                    class="text-danger">*</span></label>
                                            <select name="dropLocation" id="dropLocation" class="form-control">
                                                <option value="" disabled selected>Select Drop Location</option>
                                                @foreach ($locations as $dropLocation)
                                                    <option value="{{ $dropLocation->id }}">
                                                        {{ $dropLocation->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.seat').click(function() {
                    let seat_id = $(this).data('id');
                    let schedule_id = "{{ $schedule->id }}";
                    let user_id = "{{ Auth::user()->id }}";
                    let url = "{{ route('website.ticket.booking') }}";
                    // Drop location value check
                    if ($('#dropLocation').val() == null) {
                        alert('Please select a drop location');
                        return false;
                    }
                    let location_id = $('#dropLocation').val();

                    // Ajax request
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            seat_id: seat_id,
                            schedule_id: schedule_id,
                            user_id: user_id,
                            location_id: location_id,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                var url = "{{ route('website.home') }}";
                                window.location.href = url;
                            } else {
                                alert(response.message);
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
