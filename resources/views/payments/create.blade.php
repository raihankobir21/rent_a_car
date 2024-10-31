@extends('layouts.app')

@section('content')
<div class="container justify-content-center">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4>Add New Payment</h4>
                        </div>
                        <div class="col-sm-6 float-sm-right">
                            <a href="{{ route('payments.index') }}" class="btn btn-info float-sm-right">
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

                    <!-- Payment Form -->
                    <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf

                        @php
                            $rental_id = '';
                            $amount = '';
                            $payment_date = '';
                        @endphp

                        @error('rental_id')
                            @php $rental_id = 'is-invalid'; @endphp
                        @enderror

                        @error('amount')
                            @php $amount = 'is-invalid'; @endphp
                        @enderror

                        @error('payment_date')
                            @php $payment_date = 'is-invalid'; @endphp
                        @enderror

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Rental</label>
                                    <select name="rental_id" class="form-control {{ $rental_id }}" required>
                                        <option value="">Select a Rental</option>
                                        @foreach ($rentals as $rental)
                                            <option value="{{ $rental->id }}">{{ $rental->car->car_model }} - {{ $rental->customer->first_name }} {{ $rental->customer->last_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('rental_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('rental_id') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="number" name="amount" class="form-control {{ $amount }}" value="{{ old('amount') }}" required>
                                    @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('amount') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Payment Date</label>
                                    <input type="date" name="payment_date" class="form-control {{ $payment_date }}" value="{{ old('payment_date') }}" required>
                                    @error('payment_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('payment_date') }}</strong>
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
