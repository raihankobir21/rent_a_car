<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function models()
    {
        return $this->hasMany(ModelName::class);
    }
    public function colors()
    {
        return $this->hasMany(Color::class);
    }
    public function dailyRents()
    {
        return $this->hasMany(DailyRent::class);
    }
    public function modelNames()
    {
        return $this->hasMany(ModelName::class);
    }

}
