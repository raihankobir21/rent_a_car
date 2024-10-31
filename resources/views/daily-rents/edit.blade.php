@extends('layouts.app')

@section('content')

<div class="container justify-content-center">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4>Edit Daily Rent</h4>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('daily-rents.index') }}" class="btn btn-info float-sm-right">
                                <i class="fas fa-angle-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('daily-rents.update', $dailyRent->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @php 
                            $brandClass = '';
                            $modelClass = '';
                            $dhakaCityClass = '';
                            $outSideClass = '';
                            $cngRateClass = '';
                            $octaneRateClass = '';
                        @endphp

                        @error('brand_id')
                            @php $brandClass = 'is-invalid'; @endphp
                        @enderror

                        @error('model_name_id')
                            @php $modelClass = 'is-invalid'; @endphp
                        @enderror

                        @error('dhaka_city')
                            @php $dhakaCityClass = 'is-invalid'; @endphp
                        @enderror

                        @error('outside_dhaka')
                            @php $outSideClass = 'is-invalid'; @endphp
                        @enderror

                        @error('cng_rate')
                            @php $cngRateClass = 'is-invalid'; @endphp
                        @enderror

                        @error('octane_rate')
                            @php $octaneRateClass = 'is-invalid'; @endphp
                        @enderror

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="brand_id">Brand</label>
                                    <select name="brand_id" id="brand_id" class="form-control {{ $brandClass }}" required>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $dailyRent->brand_id == $brand->id ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="model_name_id">Model Name</label>
                                    <select name="model_name_id" id="model_name_id" class="form-control {{ $modelClass }}" required>
                                        @foreach($models as $model)
                                            <option value="{{ $model->id }}" {{ $dailyRent->model_name_id == $model->id ? 'selected' : '' }}>
                                                {{ $model->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('model_name_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Dhaka City Rate -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dhaka_city">Dhaka City Rate</label>
                                    <input type="text" name="dhaka_city" id="dhaka_city" class="form-control {{ $dhakaCityClass }}" value="{{ old('dhaka_city', $dailyRent->dhaka_city) }}" required>
                                    @error('dhaka_city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Outside Dhaka Rate -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="outside_dhaka">Outside Dhaka Rate</label>
                                    <input type="text" name="outside_dhaka" id="outside_dhaka" class="form-control {{ $outSideClass }}" value="{{ old('outside_dhaka', $dailyRent->outside_dhaka) }}" required>
                                    @error('outside_dhaka')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- CNG Rate -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cng_rate">CNG Rate Per KM</label>
                                    <input type="text" name="cng_rate" id="cng_rate" class="form-control {{ $cngRateClass }}" value="{{ old('cng_rate', $dailyRent->cng_rate) }}" required>
                                    @error('cng_rate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Octane Rate -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="octane_rate">Octane Rate Per KM</label>
                                    <input type="text" name="octane_rate" id="octane_rate" class="form-control {{ $octaneRateClass }}" value="{{ old('octane_rate', $dailyRent->octane_rate) }}" required>
                                    @error('octane_rate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
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
