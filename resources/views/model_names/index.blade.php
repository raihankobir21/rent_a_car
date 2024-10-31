<!-- resources/views/model_names/index.blade.php -->

@extends('layouts.app')

@section('content')

<div class="container justify-content-center">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4>Model List</h4>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('model_names.create') }}" class="btn btn-info float-sm-right">
                                <i class="fas fa-plus-circle"></i> Add New Model
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($modelNames as $modelName)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $modelName->brand->name }}</td>
                                    <td>{{ $modelName->name }}</td>
                                    <td>{{ $modelName->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('model_names.edit', $modelName->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('model_names.destroy', $modelName->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <br/>
                        {!! $modelNames->links("pagination::bootstrap-4") !!}
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
