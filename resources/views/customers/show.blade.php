@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Customer Details</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $customer->first_name }} {{ $customer->last_name }}</h5>
            <p><strong>Email:</strong> {{ $customer->email }}</p>
            <p><strong>Phone:</strong> {{ $customer->phone }}</p>
            <p><strong>Address:</strong> {{ $customer->address }}</p>
        </div>
    </div>

    <a href="{{ route('customers.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
