@extends('layouts.app')

@section('content')

    <div class="container justify-content-center">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h4>Car Booking Registrations List</h4>
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
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Registration Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($registrations as $registration)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $registration->Fname }}</td>
                                        <td>{{ $registration->Lname }}</td>
                                        <td>{{ $registration->phone_no }}</td>
                                        <td>{{ $registration->email }}</td>
                                        <td>{{ $registration->message ?? 'N/A' }}</td>
                                        <td>{{ $registration->created_at->format('Y-m-d H:i:s') }}</td>
                                        <td>
                                            <a href="{{ route('car-book-registrations.show', $registration->id) }}" class="btn btn-info">Show</a>
                                           
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <br/>
                            {!! $registrations->links("pagination::bootstrap-4") !!}
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
