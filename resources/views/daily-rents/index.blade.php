@extends('layouts.app')

@section('content')

<div class="container justify-content-center">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4>Daily Rent List</h4>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('daily-rents.create') }}" class="btn btn-info float-sm-right">
                                <i class="fas fa-plus"></i> Add Daily Rent
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Dhaka City Rate</th>
                                <th>Outside Dhaka Rate</th>
                                <th>CNG Rate Per KM</th>
                                <th>Octane Rate Per KM</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dailyRents as $dailyRent)
                                <tr>
                                    <td>{{ $dailyRent->brand->name }}</td>
                                    <td>{{ $dailyRent->modelName->name }}</td>
                                    <td>{{ $dailyRent->dhaka_city }}</td>
                                    <td>{{ $dailyRent->outside_dhaka }}</td>
                                    <td>{{ $dailyRent->cng_rate }}</td>
                                    <td>{{ $dailyRent->octane_rate }}</td>
                                    <td>
                                        @if($dailyRent->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('daily-rents.show', $dailyRent->id) }}" class="btn btn-sm btn-success">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <a href="{{ route('daily-rents.edit', $dailyRent->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('daily-rents.destroy', $dailyRent->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this daily rent?');">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $dailyRents->links() }} <!-- Pagination links -->
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
