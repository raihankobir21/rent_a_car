@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Payment Details</h2>

    <table class="table table-bordered">
        <tr>
            <th>Rental ID</th>
            <td>{{ $payment->rental->id }}</td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>{{ $payment->amount }}</td>
        </tr>
        <tr>
            <th>Payment Date</th>
            <td>{{ $payment->payment_date }}</td>
        </tr>
    </table>

    <a href="{{ route('payments.index') }}" class="btn btn-secondary">Back to Payments</a>
    <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning">Edit Payment</a>
</div>
@endsection
