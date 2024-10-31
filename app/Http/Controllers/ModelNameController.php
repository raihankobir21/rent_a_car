<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\ModelName;
use Illuminate\Http\Request;

class ModelNameController extends Controller
{
    public function index()
    {
        $modelNames = ModelName::with('brand')->paginate(10); // Fetch all model names with their related brands
        return view('model_names.index', compact('modelNames'));
    }

    public function create()
    {
        $brands = Brand::all(); // Get all brands to display in the dropdown
        return view('model_names.create', compact('brands'));
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'brand_id' => 'required|integer|exists:brands,id', // Ensure brand_id is valid and exists
            'name' => 'required|string|max:255', // Validate name
            'remarks' => 'nullable|string', // Validate remarks
            'status' => 'required|integer|in:0,1', // Validate status (0 or 1)
        ]);

        // Create a new model name using validated data
        ModelName::create($request->all());

        // Redirect to index with a success message
        return redirect()->route('model_names.index')->with('success', 'Model name created successfully.');
    }


    // Show the form for editing the specified resource
    // public function edit(ModelName $modelName)
    // {
    //     $brands = Brand::all(); // Get all brands to display in the dropdown
    //     return view('model_names.edit', compact('modelName', 'brands'));
    // }
    public function edit(ModelName $modelName)
{
    // Get all brands for the brand dropdown
    $brands = Brand::all();

    // Get models based on the selected brand in case of edit
    $models = Model::where('brand_id', $modelName->brand_id)->get();

    // Pass all necessary data to the view
    return view('cars.edit', compact('modelName', 'brands', 'models'));
}




    // Update the specified resource in storage
    public function update(Request $request, ModelName $modelName)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'remarks' => 'nullable|string',
            'brand_id' => 'required|exists:brands,id', // Validate brand_id if necessary
            'status' => 'required|boolean',
        ]);

        // Update the model instance
        $modelName->name = $request->input('name');
        $modelName->remarks = $request->input('remarks');
        $modelName->brand_id = $request->input('brand_id');
        $modelName->status = $request->input('status');
        $modelName->modified_by = auth()->id(); // Assuming you're tracking who modified the record

        // Save the model
        $modelName->save();

        // Redirect back to the index with a success message
        return redirect()->route('model_names.index')->with('success', 'Model updated successfully.');
    }


    // Remove the specified resource from storage
    public function destroy(ModelName $modelName)
    {
        $modelName->delete();

        return redirect()->route('model-names.index')->with('success', 'Model name deleted successfully.');
    }
}
