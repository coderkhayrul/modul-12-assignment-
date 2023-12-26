@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Edit A Seat
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.seats.update', $seat) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="name" class="form-label">Seat Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ $seat->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="bus_id" class="form-label">Bus Name</label>
                                <select name="bus_id" id="bus_id"
                                    class="form-control @error('bus_id') is-invalid @enderror">
                                    <option value="">Select Bus</option>
                                    @foreach ($buses as $key => $bus)
                                        <option value="{{ $bus->id }}"
                                            @if ($seat->bus_id == $bus->id) selected @endif>{{ $bus->name }}</option>
                                    @endforeach
                                </select>
                                @error('bus_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('admin.seats.index') }}" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
