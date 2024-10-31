@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Payment</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('payments.update', $payment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="rental_id">Rental:</label>
            <select name="rental_id" class="form-control" required>
                <option value="">Select a Rental</option>
                @foreach ($rentals as $rental)
                    <option value="{{ $rental->id }}" {{ $payment->rental_id == $rental->id ? 'selected' : '' }}>
                        {{ $rental->car->car_model }} - {{ $rental->customer->first_name }} {{ $rental->customer->last_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" name="amount" class="form-control" value="{{ $payment->amount }}" required>
        </div>

        <div class="form-group">
            <label for="payment_date">Payment Date:</label>
            <input type="date" name="payment_date" class="form-control" value="{{ $payment->payment_date }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Payment</button>
    </form>
</div>
@endsection
