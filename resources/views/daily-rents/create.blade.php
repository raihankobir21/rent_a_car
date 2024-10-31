@extends('layouts.app')

@section('content')

<div class="container justify-content-center">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4>Add Daily Rent</h4>
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
                    <form action="{{ route('daily-rents.store') }}" method="POST">
                        @csrf

                        @php 
                            $brandClass = '';
                            $modelClass = '';
                            $dhakaClass = '';
                            $outsideDhakaClass = '';
                            $cngClass = '';
                            $octaneClass = '';
                            $statusClass = '';
                        @endphp

                        @error('brand_id')
                            @php $brandClass = 'is-invalid'; @endphp
                        @enderror

                        @error('model_name_id')
                            @php $modelClass = 'is-invalid'; @endphp
                        @enderror

                        @error('dhaka_city')
                            @php $dhakaClass = 'is-invalid'; @endphp
                        @enderror

                        @error('outside_dhaka')
                            @php $outsideDhakaClass = 'is-invalid'; @endphp
                        @enderror

                        @error('cng_rate')
                            @php $cngClass = 'is-invalid'; @endphp
                        @enderror

                        @error('octane_rate')
                            @php $octaneClass = 'is-invalid'; @endphp
                        @enderror

                        @error('status')
                            @php $statusClass = 'is-invalid'; @endphp
                        @enderror

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Brand -->
                                <div class="form-group">
                                    <label for="brand_id">Brand</label>
                                    <select name="brand_id" id="brand_id" class="form-control brand_id {{ $brandClass }}" required>
                                        <option value="">Select Brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('brand_id') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Model -->
                                <div class="form-group">
                                    <label for="model_name_id">Model Name</label>
                                    <select name="model_name_id" id="model_name_id" class="form-control model_name_id {{ $modelClass }}" required>
                                        <option value="">Select Model</option>
                                    </select>
                                    @error('model_name_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('model_name_id') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Dhaka City -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dhaka_city">Dhaka City Rate</label>
                                    <textarea name="dhaka_city" id="dhaka_city" class="form-control {{ $dhakaClass }}" rows="3">{{ old('dhaka_city') }}</textarea>
                                    @error('dhaka_city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('dhaka_city') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Outside Dhaka -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="outside_dhaka">Outside Dhaka Rate</label>
                                    <textarea name="outside_dhaka" id="outside_dhaka" class="form-control {{ $outsideDhakaClass }}" rows="3">{{ old('outside_dhaka') }}</textarea>
                                    @error('outside_dhaka')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('outside_dhaka') }}</strong>
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
                                    <input type="number" name="cng_rate" id="cng_rate" class="form-control {{ $cngClass }}" step="0.01" value="{{ old('cng_rate') }}" required>
                                    @error('cng_rate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cng_rate') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Octane Rate -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="octane_rate">Octane Rate Per KM</label>
                                    <input type="number" name="octane_rate" id="octane_rate" class="form-control {{ $octaneClass }}" step="0.01" value="{{ old('octane_rate') }}" required>
                                    @error('octane_rate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('octane_rate') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control {{ $statusClass }}" required>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-info">Create Daily Rent</button>
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

<script>
    $(".brand_id").change(function() {
        var value = $(this).val();
        var route = {!! json_encode(url('/')) !!} + '/cars/get-model-names/' + value;

        emptyFieldClass = ['model_name_id'];
        targetShowClass = 'model_name_id';

        getAutoDropdownData(targetShowClass, route, emptyFieldClass);
    });
</script>

@endsection
