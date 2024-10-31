@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Salary Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Monthly Salary Report</h2>

        <!-- Search Form -->
        <form action="{{ route('monthly-salary-reports.index') }}" method="GET">
            <div class="row mb-4">
                <div class="col-md-3">
                    <label for="staff_id">Select Staff:</label>
                    <select name="staff_id" class="form-control">
                        <option value="">-- All Staff --</option>
                        @foreach($staffs as $staff)
                            <option value="{{ $staff->id }}" {{ request('staff_id') == $staff->id ? 'selected' : '' }}>
                                {{ $staff->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="from_date">From Date:</label>
                    <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}" required>
                </div>
                <div class="col-md-3">
                    <label for="to_date">To Date:</label>
                    <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}" required>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary mt-4">Generate Report</button>
                </div>
            </div>
        </form>

        <!-- Report Table -->
        @if(isset($reportData) && count($reportData) > 0)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Staff Name</th>
                            <th>Attendance Days</th>
                            <th>Total Payable Salary</th>
                            <th>Detailed Breakdown</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reportData as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $data['staff_name'] }}</td>
                                <td>{{ $data['attendance_days'] }}</td>
                                <td>{{ $data['total_payable_salary'] }}</td>
                                <td>
                                    <button class="btn btn-info btn-sm" data-toggle="collapse" data-target="#breakdown-{{ $key }}">
                                        View Breakdown
                                    </button>
                                    <div id="breakdown-{{ $key }}" class="collapse">
                                        <table class="table mt-2">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Payable Salary for the Day</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data['salary_breakdown'] as $date => $dailySalary)
                                                    <tr>
                                                        <td>{{ $date }}</td>
                                                        <td>{{ $dailySalary }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h4 class="text-center mt-4">No records found for the selected date range.</h4>
        @endif
    </div>

    <!-- Bootstrap JS (Optional for Collapsible Rows) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
