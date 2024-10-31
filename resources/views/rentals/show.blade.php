@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Rental Details</h2>

    <table class="table table-bordered">
        <tr>
            <th>Car Model</th>
            <td>{{ $rental->car->car_model }}</td>
        </tr>
        <tr>
            <th>Customer Name</th>
            <td>{{ $rental->customer->first_name }} {{ $rental->customer->last_name }}</td>
        </tr>
        <tr>
            <th>Rental Start Date</th>
            <td>{{ $rental->rental_start_date }}</td>
        </tr>
        <tr>
            <th>Rental End Date</th>
            <td>{{ $rental->rental_end_date }}</td>
        </tr>
    </table>

    <a href="{{ route('rentals.index') }}" class="btn btn-secondary">Back to Rentals</a>
    <a href="{{ route('rentals.edit', $rental->id) }}" class="btn btn-warning">Edit Rental</a>
</div>
@endsection
