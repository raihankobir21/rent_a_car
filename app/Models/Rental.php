<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'customer_id',
        'rental_date',
        'return_date',
        'total_amount',
        'status',
    ];

    // A Rental belongs to a Car
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    // A Rental belongs to a Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // A Rental can have many Payments
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
