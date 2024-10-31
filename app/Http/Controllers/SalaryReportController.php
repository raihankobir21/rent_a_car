<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;

class SalaryReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        // Get all users for the dropdown menu
        $staffs = User::all();
    
        // Initialize report data
        $reportData = [];
    
        // Check if date filters are provided
        if ($request->has('from_date') && $request->has('to_date')) {
            // Parse dates with Carbon for comparison
            $fromDate = Carbon::parse($request->input('from_date'))->startOfDay();
            $toDate = Carbon::parse($request->input('to_date'))->endOfDay();
    
            // Fetch the users based on the selected staff ID or fetch all users
            $users = $request->input('staff_id') ? User::where('id', $request->input('staff_id'))->get() : User::all();
    
            foreach ($users as $user) {
                // Fetch attendance records within the specified date range
                $attendances = Attendance::where('user_id', $user->id)
                    ->whereBetween('created_at', [$fromDate, $toDate])
                    ->get();
    
                if ($attendances->isNotEmpty()) {
                    $salaryBreakdown = [];
                    $totalPayableSalary = 0;
    
                    // Calculate daily salary and accumulate total payable salary
                    foreach ($attendances as $attendance) {
                        $attendanceDate = $attendance->created_at->format('Y-m-d');
                        $payableSalary = $attendance->payable_salary ?? 0; // Use 0 if the salary is null
                        $salaryBreakdown[$attendanceDate] = $payableSalary;
    
                        // Accumulate the total salary for the user
                        $totalPayableSalary += $payableSalary;
                    }
    
                    // Prepare the report data for each user
                    $reportData[] = [
                        'staff_name' => $user->name,
                        'attendance_days' => $attendances->count(),
                        'total_payable_salary' => number_format($totalPayableSalary, 2), // Format salary
                        'salary_breakdown' => $salaryBreakdown,
                    ];
                }
            }
        }
    
        // Return the view with the necessary data
        return view('monthly-salary-reports.index', compact('staffs', 'reportData'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
