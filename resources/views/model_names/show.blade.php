@extends('layouts.app')

@section('content')

<div class="container justify-content-center">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4>Model Name Details</h4>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('model_names.index') }}" class="btn btn-info float-sm-right">
                                <i class="fas fa-angle-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Brand:</strong>
                            <p>{{ $modelName->brand->Name }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Model Name:</strong>
                            <p>{{ $modelName->Name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <strong>Remarks:</strong>
                            <p>{{ $modelName->remarks }}</p>
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
