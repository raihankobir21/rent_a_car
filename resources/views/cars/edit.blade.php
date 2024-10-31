@extends('layouts.app')

@section('content')

<div class="container justify-content-center">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4>Edit Car</h4>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('cars.index') }}" class="btn btn-info float-sm-right">
                                <i class="fas fa-angle-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @php 
                            $brandClass = '';
                            $modelClass = '';
                            $colorClass = '';
                            $registrationClass = '';
                            $carTypeClass = '';
                            $seatingClass = '';
                            $priceClass = '';
                        @endphp

                        @error('brand_id')
                            @php $brandClass = 'is-invalid'; @endphp
                        @enderror

                        @error('model_name_id')
                            @php $modelClass = 'is-invalid'; @endphp
                        @enderror

                        @error('color_id')
                            @php $colorClass = 'is-invalid'; @endphp
                        @enderror

                        @error('registration_no')
                            @php $registrationClass = 'is-invalid'; @endphp
                        @enderror

                        @error('car_type')
                            @php $carTypeClass = 'is-invalid'; @endphp
                        @enderror

                        @error('seating_capacity')
                            @php $seatingClass = 'is-invalid'; @endphp
                        @enderror

                        @error('rental_price_per_day')
                            @php $priceClass = 'is-invalid'; @endphp
                        @enderror

                        <div class="row">
                            <div class="col-md-6">
                               

                                <div class="form-group">
                                    <label for="brand_id">Brand</label>
                                    <select name="brand_id" id="brand_id" class="form-control brand_id" required>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $brand->brand_id == $brand->id ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="col-md-6">
                                
                                
                                <div class="form-group">
                                    <label for="model_name_id">Model Name</label>
                                    <select name="model_name_id" id="model_name_id" class="form-control model_name_id" required>
                                        @foreach($models as $model)
                                            <option value="{{ $model->id }}" {{ $car->model_name_id == $model->id ? 'selected' : '' }}>
                                                {{ $model->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <!-- Color -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="color_id">Color</label>
                                    <select name="color_id" id="color_id" class="form-control {{ $colorClass }}" required>
                                        @foreach($colors as $color)
                                            <option value="{{ $color->id }}" {{ $car->color_id == $color->id ? 'selected' : '' }}>
                                                {{ $color->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('color_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('color_id') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Registration No -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="registration_no">Registration No.</label>
                                    <input type="text" name="registration_no" id="registration_no" class="form-control {{ $registrationClass }}" value="{{ old('registration_no', $car->registration_no) }}" required>
                                    @error('registration_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('registration_no') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Car Type -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="car_type">Car Type</label>
                                    <input type="text" name="car_type" id="car_type" class="form-control {{ $carTypeClass }}" value="{{ old('car_type', $car->car_type) }}" required>
                                    @error('car_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('car_type') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Seating Capacity -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="seating_capacity">Seating Capacity</label>
                                    <input type="number" name="seating_capacity" id="seating_capacity" class="form-control {{ $seatingClass }}" value="{{ old('seating_capacity', $car->seating_capacity) }}" required>
                                    @error('seating_capacity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('seating_capacity') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Rental Price -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rental_price_per_day">Rental Price Per Day</label>
                                    <input type="text" name="rental_price_per_day" id="rental_price_per_day" class="form-control {{ $priceClass }}" value="{{ old('rental_price_per_day', $car->rental_price_per_day) }}" required>
                                    @error('rental_price_per_day')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('rental_price_per_day') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Car Image <span class="highlight">( Type: jpeg, jpg, png. Max size= 512 KB)</span> <span class="man-remark" style="color:red;font-size:12px">*</span></label>
                                    <input type="file" name="image" class="form-control">
                                    @if( !empty($car->image) )
                                        <a href="{{ asset('storage/app/'. !empty($car->image) ? $car->image : '') }}" target="_blank">View Current Image</a>
                                    @endif
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Feature Image -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="feature_image">Feature Image</label>
                                    <input type="file" name="feature_image" id="feature_image" class="form-control">
                                    <small class="form-text text-muted">Leave empty if you don't want to change the feature image.</small>
                                    @error('feature_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('feature_image') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control">{{ old('description', $car->description) }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-info">Update</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
<!-- jQuery and AJAX for loading models dynamically -->
<script>
        $(".brand_id").change(function() {
           // alert('yy');
            var value = [];
            value = $(this).val();

            route = {!! json_encode(url('/')) !!}+'/cars/get-model-names/'+ value;

            emptyFieldClass = ['model_name_id'];

            targetShowClass = 'model_name_id';

            getAutoDropdownData(targetShowClass, route, emptyFieldClass);


        });
</script>

@endsection
