@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        All Schedule List
                        <a href="{{ route('admin.schedules.create') }}" class="btn btn-sm btn-success"
                            style="float: right;">Add
                            New</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Bus Name</th>
                                    <th scope="col">Trip Name</th>
                                    <th scope="col">Departure Date</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $key => $schedule)
                                    <tr>
                                        <td>{{ $schedule?->bus?->name ?? 'N/A' }}</td>
                                        <td>{{ $schedule?->trip?->name ?? 'N/A' }}</td>
                                        <td>
                                            {{ $schedule->departure_date }}
                                        </td>
                                        <td>৳{{ $schedule->fare }}</td>
                                        <td>
                                            <a href="{{ route('admin.schedules.edit', $schedule) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <a href="{{ route('admin.schedules.destroy', $schedule) }}"
                                                data-confirm-delete="true" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
