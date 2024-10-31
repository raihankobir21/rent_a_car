<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'model_name_id',
        'color_id',
        'registration_no',
        'car_type',
        'image',
        'feature_image',
        'description',
        'seating_capacity',
        'rental_price_per_day',
        'status',
        'created_by',
        'modified_by',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function modelName()
    {
        return $this->belongsTo(ModelName::class, 'model_name_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    // A Car can have many Rentals
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
