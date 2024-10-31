@extends('layouts.app')

@section('content')

<div class="container justify-content-center">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4>Brand Details</h4>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('brands.index') }}" class="btn btn-info float-sm-right">
                                <i class="fas fa-angle-left"></i> Back to List
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Name:</h5>
                            <p>{{ $brand->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Description:</h5>
                            <p>{{ $brand->description }}</p>
                        </div>
                    </div>
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
