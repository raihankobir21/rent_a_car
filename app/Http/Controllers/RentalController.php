<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Car;
use App\Models\Customer;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the rentals.
     */
    public function index()
    {
        // Paginate rentals, displaying 10 rentals per page
        $rentals = Rental::with(['car', 'customer'])->paginate(10);
        return view('rentals.index', compact('rentals'));
    }

    /**
     * Show the form for creating a new rental.
     */
    public function create()
    {
        $cars = Car::where('status', 'available')->get();
        $customers = Customer::all();
        dd($cars);
        return view('rentals.create', compact('cars', 'customers'));
    }

    /**
     * Store a newly created rental in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'customer_id' => 'required|exists:customers,id',
            'rental_start_date' => 'required|date',
            'rental_end_date' => 'required|date|after_or_equal:rental_start_date',
        ]);

        Rental::create($validatedData);

        // Update the car status to rented
        $car = Car::find($request->car_id);
        $car->update(['status' => 'rented']);

        return redirect()->route('rentals.index')->with('success', 'Rental created successfully.');
    }

    /**
     * Display the specified rental.
     */
    public function show(Rental $rental)
    {
        $rental->load(['car', 'customer']);
        return view('rentals.show', compact('rental'));
    }

    /**
     * Show the form for editing the specified rental.
     */
    public function edit(Rental $rental)
    {
        $cars = Car::where('status', 'available')->orWhere('id', $rental->car_id)->get();
        $customers = Customer::all();
        return view('rentals.edit', compact('rental', 'cars', 'customers'));
    }

    /**
     * Update the specified rental in storage.
     */
    public function update(Request $request, Rental $rental)
    {
        $validatedData = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'customer_id' => 'required|exists:customers,id',
            'rental_start_date' => 'required|date',
            'rental_end_date' => 'required|date|after_or_equal:rental_start_date',
        ]);

        $rental->update($validatedData);

        // Update the car status if necessary
        $car = Car::find($request->car_id);
        $car->update(['status' => 'rented']);

        return redirect()->route('rentals.index')->with('success', 'Rental updated successfully.');
    }

    /**
     * Remove the specified rental from storage.
     */
    public function destroy(Rental $rental)
    {
        $car = Car::find($rental->car_id);
        $car->update(['status' => 'available']); // Update the car status to available
        $rental->delete();
        return redirect()->route('rentals.index')->with('success', 'Rental deleted successfully.');
    }
}
