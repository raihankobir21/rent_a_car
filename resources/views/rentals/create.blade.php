@extends('layouts.app')

@section('content')
<div class="container justify-content-center">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4>Add New Rental</h4>
                        </div>
                        <div class="col-sm-6 float-sm-right">
                            <a href="{{ route('rentals.index') }}" class="btn btn-info float-sm-right">
                                <i class="fas fa-angle-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Rental Form -->
                    <form action="{{ route('rentals.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf

                        @php
                            $car_id = '';
                            $customer_id = '';
                            $rental_start_date = '';
                            $rental_end_date = '';
                        @endphp

                        @error('car_id')
                            @php $car_id = 'is-invalid'; @endphp
                        @enderror

                        @error('customer_id')
                            @php $customer_id = 'is-invalid'; @endphp
                        @enderror

                        @error('rental_start_date')
                            @php $rental_start_date = 'is-invalid'; @endphp
                        @enderror

                        @error('rental_end_date')
                            @php $rental_end_date = 'is-invalid'; @endphp
                        @enderror

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Car</label>
                                    <select name="car_id" class="form-control {{ $car_id }}" required>
                                        <option value="">Select a Car</option>
                                        @foreach ($cars as $car)
                                            <option value="{{ $car->id }}">{{ $car->car_model }} ({{ $car->registration_no }})</option>
                                        @endforeach
                                    </select>
                                    @error('car_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('car_id') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Customer</label>
                                    <select name="customer_id" class="form-control {{ $customer_id }}" required>
                                        <option value="">Select a Customer</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('customer_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('customer_id') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Rental Start Date</label>
                                    <input type="date" name="rental_start_date" class="form-control {{ $rental_start_date }}" value="{{ old('rental_start_date') }}" required>
                                    @error('rental_start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('rental_start_date') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Rental End Date</label>
                                    <input type="date" name="rental_end_date" class="form-control {{ $rental_end_date }}" value="{{ old('rental_end_date') }}" required>
                                    @error('rental_end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('rental_end_date') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
@endsection
