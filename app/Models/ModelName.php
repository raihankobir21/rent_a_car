<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class ModelName extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'name',
        'remarks',
        'status',
        'created_by',
        'modified_by',
    ];

    // Define the relationship with the Brand model
    public function brand()
    {
        return $this->belongsTo(Brand::class); // This defines that each model name belongs to one brand
    }

    // One ModelName can have many Cars
    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function dailyRents()
    {
        return $this->hasMany(DailyRent::class, 'model_name_id');
    }

}
