<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Brand;
use App\Models\ModelName;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function frontEnd()
    {
        return view ('frontend.home');
    }

    public function displayCarsInFrontend()
    {
        // Fetch car image, brand, and model
        $cars = Car::with(['brand', 'modelName']) // Assuming brand and modelName relationships are set up
                ->select('id', 'image', 'brand_id', 'model_name_id') // Fetch only necessary fields
                ->get();

        // Return the frontend home view with the cars data
        return view('frontend.home', compact('cars'));
    }

    public function showCarDetailsBook($id)
    {
        $car = Car::with(['brand', 'modelName', 'color'])->findOrFail($id);
        return view('frontend.car-details-book', compact('car'));
    }

    public function displayDailyRent()
    {
        $dailyRents = DailyRent::with('brand', 'model')->get(); // assuming relationships are set up
        return view('frontend.daily-rent-shows', compact('dailyRents'));
    }
    

}
