@extends('layouts.app')

@section('content')

<div class="container justify-content-center">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Car Details</h4>
                    <a href="{{ route('cars.index') }}" class="btn btn-info float-right">
                        <i class="fas fa-angle-left"></i> Back
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="col-md-6"><strong>Brand:</strong></td>
                                <td class="col-md-6">{{ $car->brand->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-6"><strong>Model Name:</strong></td>
                                <td class="col-md-6">{{ $car->modelName->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-6"><strong>Color:</strong></td>
                                <td class="col-md-6">{{ $car->color->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-6"><strong>Registration No:</strong></td>
                                <td class="col-md-6">{{ $car->registration_no }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-6"><strong>Car Type:</strong></td>
                                <td class="col-md-6">{{ $car->car_type }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-6"><strong>Seating Capacity:</strong></td>
                                <td class="col-md-6">{{ $car->seating_capacity }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-6"><strong>Rental Price Per Day:</strong></td>
                                <td class="col-md-6">${{ number_format($car->rental_price_per_day, 2) }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-6"><strong>Car Image:</strong></td>
                                <td class="col-md-6">
                                    @if($car->image)
                                        <img src="{{ asset('storage/app/' . $car->image) }}" alt="Car Image" class="img-fluid" style="max-width: 100%;">
                                    @else
                                        <p>No image available.</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="col-md-6"><strong>Feature Image:</strong></td>
                                <td class="col-md-6">
                                    @if($car->feature_image)
                                        <img src="{{ asset('storage/' . $car->feature_image) }}" alt="Feature Image" class="img-fluid" style="max-width: 100%;">
                                    @else
                                        <p>No feature image available.</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="col-md-6"><strong>Description:</strong></td>
                                <td class="col-md-6">{{ $car->description ?? 'N/A' }}</td>
                            </tr>
                        </tbody>
                    </table>
                        <!-- <div class="d-flex justify-content-center mt-4">
                            <a href="{{ route('car-books.create', ['car_id' => $car->id]) }}" class="btn btn-primary btn-lg">
                                Book Now
                            </a>
                        </div> -->
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

@endsection
