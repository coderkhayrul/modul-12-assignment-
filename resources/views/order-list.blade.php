@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">All Ticket List</div>
                    <div class="card-body">
                        <!-- Display -->
                        <div class="list-group">
                            @foreach ($orders as $order)
                                <a href="#"
                                    class="list-group-item list-group-item-action border border-primary rounded my-2"
                                    aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ $order?->schedule?->trip?->name ?? 'N/A' }}</h5>
                                        <small>৳{{ $order?->schedule->fare }}</small>
                                    </div>
                                    <p class="mb-1">User Name: <span
                                            class="text-danger fs-5">{{ $order->user->name }}</span>
                                    </p>
                                    <p class="mb-1">Seat Number: {{ $order->seat->name }}</p>
                                    <p class="mb-1">Bus Name: {{ $order->schedule->bus->name }}</p>
                                    <p class="mb-1">Date: {{ $order->schedule->departure_date }}</p>
                                    <small>Drop Location: {{ $order?->location?->name ?? 'N/A' }}</small>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
