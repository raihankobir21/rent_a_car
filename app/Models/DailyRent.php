<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyRent extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_id', 
        'model_name_id', 
        // 'color_id', 
        'dhaka_city', 
        'outside_dhaka', 
        'cng_rate', 
        'octane_rate', 
        'status', 
        'created_by', 
        'modified_by'
    ];

    // A daily rent belongs to a brand
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // A daily rent belongs to a model
    public function modelName()
    {
        return $this->belongsTo(ModelName::class, 'model_name_id');
    }

    // A daily rent belongs to a color
    // public function color()
    // {
    //     return $this->belongsTo(Color::class);
    // }
}
