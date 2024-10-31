@extends('frontend.layouts.master')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Price List in BDT</h2>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Type of Car</th>
                        <th>Modal Year</th>
                        <th>Dhaka City</th>
                        <th>Outside Dhaka</th>
                        <th>CNG Per Km</th>
                        <th>Octane Per Km</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dailyRents as $rent)
                    <tr>
                        <td>{{ $rent->brand->name }} / {{ $rent->model->name }}</td>
                        <td>{{ $rent->model->year }}</td>
                        <td>{{ $rent->dhaka_city }} BDT</td>
                        <td>{{ $rent->outside_dhaka }} BDT</td>
                        <td>{{ $rent->cng_rate }} BDT</td>
                        <td>{{ $rent->octane_rate }} BDT</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
