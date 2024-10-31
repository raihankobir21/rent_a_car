<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::paginate(10); // Get colors with pagination
        return view('colors.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('colors.create');
    }

    public function store(Request $request)
    {
        // Dump the validation rules to ensure they are correct
        //dd($request->all(), $this->rules());

        $validatedData = $request->validate($this->rules());

        Color::create($validatedData);
        return redirect()->route('colors.index');
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ];
    }


    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        $color = Color::findOrFail($id);
        return view('colors.show', compact('color'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        return view('colors.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Update the color directly using the bound model
        $color->update([
            'name' => $request->name,
            'status' => $request->status,
            'modified_by' => auth()->id(), // Assuming user is authenticated
        ]);

        return redirect()->route('colors.index')->with('success', 'Color updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $color = Color::findOrFail($id);
        $color->delete();
        return redirect()->route('colors.index')->with('success', 'Color deleted successfully.');
    }
}
