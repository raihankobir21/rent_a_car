@extends('layouts.app')

@section('content')
<div class="container justify-content-center">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4>Rental List</h4>
                        </div>
                        <div class="col-sm-6 float-sm-right">
                            <a href="{{ route('rentals.create') }}" class="btn btn-info float-sm-right">
                                <i class="fas fa-plus-circle"></i> Add New Rental
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Car Model</th>
                                    <th>Customer Name</th>
                                    <th>Rental Start Date</th>
                                    <th>Rental End Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rentals as $index => $rental)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td> <!-- Serial Number -->
                                        <td>{{ $rental->car->car_model }}</td>
                                        <td>{{ $rental->customer->first_name }} {{ $rental->customer->last_name }}</td>
                                        <td>{{ $rental->rental_start_date }}</td>
                                        <td>{{ $rental->rental_end_date }}</td>
                                        <td>
                                            <a href="{{ route('rentals.show', $rental->id) }}" class="btn btn-info btn-sm">Show</a>
                                            <a href="{{ route('rentals.edit', $rental->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this rental?');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <br/>
                        {!! $rentals->links("pagination::bootstrap-4") !!}
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
