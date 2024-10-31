@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Car Booking Registration Details</h2>

    <div class="card mb-4">
        <div class="card-body">
            <p><strong>First Name:</strong> {{ $registration->Fname }}</p>
            <p><strong>Last Name:</strong> {{ $registration->Lname }}</p>
            <p><strong>Phone Number:</strong> {{ $registration->phone_no }}</p>
            <p><strong>Email:</strong> {{ $registration->email }}</p>
            <p><strong>Message:</strong> {{ $registration->message ?? 'N/A' }}</p>
            <p><strong>Registration Date:</strong> {{ $registration->created_at->format('Y-m-d H:i:s') }}</p>
        </div>
    </div>

    <a href="{{ route('car-book-registrations.index') }}" class="btn btn-secondary">Back to Registrations</a>
</div>
@endsection
