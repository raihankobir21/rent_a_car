@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Rental</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('rentals.update', $rental->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="car_id">Car:</label>
            <select name="car_id" class="form-control" required>
                <option value="">Select a Car</option>
                @foreach ($cars as $car)
                    <option value="{{ $car->id }}" {{ $rental->car_id == $car->id ? 'selected' : '' }}>
                        {{ $car->car_model }} ({{ $car->registration_no }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="customer_id">Customer:</label>
            <select name="customer_id" class="form-control" required>
                <option value="">Select a Customer</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $rental->customer_id == $customer->id ? 'selected' : '' }}>
                        {{ $customer->first_name }} {{ $customer->last_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="rental_start_date">Rental Start Date:</label>
            <input type="date" name="rental_start_date" class="form-control" value="{{ $rental->rental_start_date }}" required>
        </div>

        <div class="form-group">
            <label for="rental_end_date">Rental End Date:</label>
            <input type="date" name="rental_end_date" class="form-control" value="{{ $rental->rental_end_date }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Rental</button>
    </form>
</div>
@endsection
