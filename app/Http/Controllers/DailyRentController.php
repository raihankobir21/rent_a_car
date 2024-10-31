<?php

namespace App\Http\Controllers;

use App\Models\DailyRent;
use App\Models\Brand;
use App\Models\ModelName;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDailyRentRequest;
use App\Http\Requests\UpdateDailyRentRequest;

class DailyRentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dailyRents = DailyRent::with(['brand', 'modelName'])->paginate(10);
        return view('daily-rents.index', compact('dailyRents'));
    }

    // Show the form for creating a new daily rent
    public function create()
    {
        $brands = Brand::with('modelNames')->get();
         //dd($brands);
        return view('daily-rents.create', compact('brands'));
    }

    // Store a newly created daily rent in storage
    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'model_name_id' => 'required|exists:model_names,id',
            'dhaka_city' => 'nullable|string',
            'outside_dhaka' => 'nullable|string',
            'cng_rate' => 'required|numeric',
            'octane_rate' => 'required|numeric',
            'status' => 'required|integer|in:0,1',
        ]);

        DailyRent::create($request->all());

        return redirect()->route('daily-rents.index')->with('success', 'Daily Rent created successfully.');
    }

    // Show the form for editing the specified daily rent
    public function edit($id)
    {
        // Find the daily rent by ID
        $dailyRent = DailyRent::findOrFail($id);

        // Get all brands
        $brands = Brand::all();

        // Get models associated with the selected brand
        $models = ModelName::where('brand_id', $dailyRent->brand_id)->get();

        return view('daily-rents.edit', compact('dailyRent', 'brands', 'models'));
    }


        // Update the specified daily rent in storage
        public function update(Request $request, $id)
        {
            
            $request->validate([
                'brand_id' => 'required',
                'model_name_id' => 'required',
                'dhaka_city' => 'nullable',
                'outside_dhaka' => 'nullable|string',
                'cng_rate' => 'required|numeric',
                'octane_rate' => 'required|numeric',
            ]);
           
            $dailyRent = DailyRent::findOrFail($id);
            $dailyRent->fill($request->all());
            $dailyRent->save();

            return redirect()->route('daily-rents.index')->with('success', 'Daily Rent updated successfully.');
        }
        



    // Remove the specified daily rent from storage
    public function destroy(DailyRent $dailyRent)
    {
        $dailyRent->delete();

        return redirect()->route('daily-rents.index')->with('success', 'Daily Rent deleted successfully.');
    }

    // Get models based on the selected brand (Ajax)
    public function getModelsByBrand(Request $request)
    {
        $models = ModelName::where('brand_id', $request->brand_id)->get();
        return response()->json($models);
    }
    
}
