<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'Fname' => 'required|string|max:255',
            'Lname' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_no' => 'required|string|max:15',
            'message' => 'nullable|string',
        ]);

        // Store the data in the database
        Registration::create([
            'Fname' => $request->Fname,
            'Lname' => $request->Lname,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Your booking has been submitted successfully.');
    }

    //List all registrations (optional)
    public function index()
    {
        $registrations = Registration::paginate(10);
        return view('car-book-registrations.index', compact('registrations'));
    }

    // Show a single registration (optional)
    public function show($id)
    {
        $registration = Registration::findOrFail($id);
        return view('car-book-registrations.show', compact('registration'));
    }

    // // Edit form (optional)
    // public function edit($id)
    // {
    //     $registration = Registration::findOrFail($id);
    //     return view('registration.edit', compact('registration'));
    // }

    // Update the registration (optional)
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:registrations,email,' . $id,
    //         'phone_no' => 'nullable|string|max:11',
    //         'message' => 'nullable|string',
    //     ]);

    //     $registration = Registration::findOrFail($id);
    //     $registration->update($request->all());

    //     return redirect()->route('registration.index')->with('success', 'Registration updated successfully!');
    // }

    // Delete a registration (optional)
    // public function destroy($id)
    // {
    //     $registration = Registration::findOrFail($id);
    //     $registration->delete();

    //     return redirect()->route('registration.index')->with('success', 'Registration deleted successfully!');
    // }
}
