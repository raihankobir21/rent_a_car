@extends('frontend.layouts.master')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Booking</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS for car image sizing and layout -->
    <style>
        .car-image {
            width: 100%; 
            height: auto; 
            max-height: 300px;
        }

        .no-border {
            border: none !important;
        }

        /* Toast position */
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 10000;
        }
    </style>
</head>
<body>

<div class="container py-5 mt-5">
    <div class="row">
        <!-- Left side: Car details -->
        <div class="col-md-6">
            <div class="card mb-4 no-border">
                <div class="card-body text-center">
                    <!-- Brand Name -->
                    <h3 class="mb-3" style="font-weight: bold;">{{ $car->brand->name ?? 'Brand Name' }}</h3>

                    <!-- Car Image -->
                    @if($car->image)
                        <img src="{{ asset('storage/app/' . $car->image) }}" alt="Car Image" class="img-fluid car-image">
                    @else
                        <p>No image available.</p>
                    @endif

                    <!-- Car Model Year (Bold) -->
                    <h4 class="mt-3" style="font-weight: bold;">Model Year: {{ $car->modelName->name ?? 'N/A' }}</h4>
                </div>

                <!-- Car Details -->
                <div class="card-body">
                    <p><strong>Registration No:</strong> {{ $car->registration_no }}</p>
                    <p><strong>Color:</strong> {{ $car->color->name ?? 'N/A' }}</p>
                    <p><strong>Car Type:</strong> {{ $car->car_type }}</p>
                    <p><strong>Seating Capacity:</strong> {{ $car->seating_capacity }}</p>
                    <p><strong>Rental Price Per Day:</strong> ${{ number_format($car->rental_price_per_day, 2) }}</p>

                    <div class="mt-3">
                        <p><strong>Description:</strong> {{ $car->description ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right side: Registration form -->
        <div class="col-md-6">
            <div class="card mb-4 no-border">
                <div class="card-body">
                    <form action="{{ route('registrations.store') }}" method="POST" class="wpcf7-form" novalidate="novalidate">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Fname">First Name*</label>
                                    <input type="text" name="Fname" id="Fname" class="form-control" placeholder="Enter your first name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Lname">Last Name*</label>
                                    <input type="text" name="Lname" id="Lname" class="form-control" placeholder="Enter your last name" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_no">Phone Number</label>
                                    <input type="tel" name="phone_no" id="phone_no" class="form-control" placeholder="Enter your phone number" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email*</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="email@domain.com" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" class="form-control" rows="4" placeholder="Enter your message..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary" style="width: 130px;">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast message -->
<div class="toast-container">
    @if(session('success'))
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
        <div class="toast-header">
            <strong class="mr-auto text-success">Success</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            {{ session('success') }}
        </div>
    </div>
    @endif
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        // Show the toast message if it exists
        @if(session('success'))
            $('.toast').toast('show');
        @endif
    });
</script>

</body>
</html>
@endsection
