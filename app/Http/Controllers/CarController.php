<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Brand;
use App\Models\ModelName;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::with('brand', 'modelName', 'color')->paginate(10); // Load cars with their related data
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        $brands = Brand::all();
        $colors = Color::all();
        return view('cars.create', compact('brands', 'colors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required',
            'model_name_id' => 'required',
            'color_id' => 'required',
            'registration_no' => 'required|unique:cars',
            'car_type' => 'required',
            'seating_capacity' => 'required|integer',
            'rental_price_per_day' => 'required|numeric',
            'image' => 'nullable|image',
            'feature_image' => 'nullable|image',
        ]);

        $car = new Car($request->all());
        if ($request->hasFile('image')) {
            $car->image = $request->file('image')->store('cars/images');
        }
        if ($request->hasFile('feature_image')) {
            $car->feature_image = $request->file('feature_image')->store('cars/feature_images');
        }
        $car->save();

        return redirect()->route('cars.index')->with('success', 'Car added successfully!');
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $brands = Brand::all();
        
        $models = ModelName::where('brand_id', $car->brand_id)->get();
        $colors = Color::all();

       
        return view('cars.edit', compact('car', 'brands', 'models', 'colors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'brand_id' => 'required',
            'model_name_id' => 'required',
            'color_id' => 'required',
            'registration_no' => 'required|unique:cars,registration_no,' . $id,
            'car_type' => 'required',
            'seating_capacity' => 'required|integer',
            'rental_price_per_day' => 'required|numeric',
            'image' => 'nullable|image',
            'feature_image' => 'nullable|image',
        ]);

        $car = Car::findOrFail($id);
        $car->fill($request->all());
        if ($request->hasFile('image')) {
            $car->image = $request->file('image')->store('cars/images');
        }
        if ($request->hasFile('feature_image')) {
            $car->feature_image = $request->file('feature_image')->store('cars/feature_images');
        }
        $car->save();

        return redirect()->route('cars.index')->with('success', 'Car updated successfully!');
    }

    public function show($id)
    {
        // Retrieve the car by ID and load related data
        $car = Car::with(['brand', 'modelName', 'color'])->findOrFail($id);
        
        // Return the view with the car data
        return view('cars.show', compact('car'));
    }


   

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully!');
    }

   

 
}
