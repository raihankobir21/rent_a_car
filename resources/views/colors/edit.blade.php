@extends('layouts.app')

@section('content')

<div class="container justify-content-center">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4>Edit Color</h4>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('colors.index') }}" class="btn btn-info float-sm-right">
                                <i class="fas fa-angle-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('colors.update', $color->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @php 
                            $nameClass = '';
                            $statusClass = '';
                        @endphp

                        @error('name')
                            @php $nameClass = 'is-invalid'; @endphp
                        @enderror

                        @error('status')
                            @php $statusClass = 'is-invalid'; @endphp
                        @enderror

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control {{ $nameClass }}" id="name" name="name" value="{{ old('name', $color->name) }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control {{ $statusClass }}" id="status" name="status">
                                        <option value="1" {{ old('status', $color->status) == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status', $color->status) == '0' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                        <button type="submit" class="btn btn-info">Update</button>
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
