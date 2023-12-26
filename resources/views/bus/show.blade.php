@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Bus Seat List
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Seat Name</th>
                                    <th scope="col">Status</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bus->seats as $key => $seat)
                                    <tr>
                                        <td>{{ $seat->name }}</td>
                                        <td>
                                            @if ($seat->status == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
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
