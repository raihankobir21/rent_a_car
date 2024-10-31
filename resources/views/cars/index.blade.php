
@extends('layouts.app')

@section('content')

<div class="container justify-content-center">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4>Car List</h4>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('cars.create') }}" class="btn btn-info float-sm-right">
                                <i class="fas fa-plus"></i> Add Car
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
                                <th>Color</th>
                                <th>Registration No.</th>
                                <th>Image</th>
                                <!-- <th>feature_image</th> -->
                                <th>Car Type</th>
                                <th>Seating Capacity</th>
                                <th>Rental Price Per Day</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cars as $car)
                                <tr>
                                    <td>{{ $car->brand->name }}</td>
                                    <td>{{ $car->modelName->name }}</td>
                                    <td>{{ $car->color->name }}</td>
                                    <td>{{ $car->registration_no }}</td>
                                    <td>
                                    @if(!empty($car->image))
                                        <img src="{{ asset('storage/app/' . $car->image) }}"  style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <i class="fas fa-user-circle" style="font-size: 50px; color: #ccc;"></i> 
                                    @endif
                                    </td>
                                    <!-- <td>{{ $car->feature_image }}</td>-->
                                    <td>{{ $car->car_type }}</td> 
                                    <td>{{ $car->seating_capacity }}</td>
                                    <td>{{ $car->rental_price_per_day }}</td>
                                    <td>
                                        <a href="{{ route('cars.show', $car->id) }}" class="btn btn-sm btn-success">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this car?');">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $cars->links() }} <!-- Pagination links -->
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
