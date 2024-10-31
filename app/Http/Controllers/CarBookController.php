<?php

namespace App\Http\Controllers;

use App\Models\CarBook;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCarBookRequest;
use App\Http\Requests\UpdateCarBookRequest;

class CarBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carBooks = carBook::paginate(10);
        return view ('car-books.index', compact('carBooks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('car-books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
  
        public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:car_books,email',
            'mobile_no' => 'nullable|string|max:11|unique:car_books,mobile_no',
            'message' => 'nullable|string',
        ]);

        // Create a new CarBook instance
        $carBook = new CarBook();

        // Set the properties
        $carBook->name = $request->name;
        $carBook->email = $request->email;
        $carBook->mobile_no = $request->mobile_no;
        $carBook->message = $request->message;
        $carBook->status = $request->status ?? 1;
        $carBook->created_by = auth()->id();

        // Save the CarBook to the database
        $carBook->save();

        // Redirect back with success message
        return redirect()->route('car-books.index')->with('success', 'Car booking created successfully.');
    }

    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $carBook = CarBook::findOrFail($id);
        return view('car-books.show', compact('carBook'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $carBook = CarBook::findOrFail($id);
        return view('car-books.edit', compact('carBook'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:car_books,email,' . $id, // Exclude current record's email from unique check
            'mobile_no' => 'nullable|string|max:11|unique:car_books,mobile_no,' . $id, // Exclude current record's mobile_no from unique check
            'message' => 'nullable|string',
        ]);

        // Create a new CarBook object to represent the existing record
        $carBook = CarBook::findOrFail($id);

        // Set the object's properties
        $carBook->name = $request->name;
        $carBook->email = $request->email;
        $carBook->mobile_no = $request->mobile_no;
        $carBook->message = $request->message;
        $carBook->status = $request->status ?? 1;
        $carBook->modified_by = auth()->id();

        // Call save() to update the record
        $carBook->save();

        // Redirect back with success message
        return redirect()->route('car-books.index')->with('success', 'Car booking updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $carBook = CarBook::findOrFail($id);
        $carBook->delete();
    
        return redirect()->route('car-books.index')->with('success', 'Car booking deleted successfully.');
    }
    
}
