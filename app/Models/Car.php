<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function rental(){
        return $this->hasMany(Rental::class);
    }

    protected $fillable = [
        'name',
        'brand',
        'model',
        'year',
        'car_type',
        'daily_rent_price',
        'availability',
        'image'
    ];
}