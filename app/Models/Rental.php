<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    public function car(){
        return $this->belongsTo(Car::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
        'car_id',
        'start_date',
        'end_date',
        'days',
        'total_cost',
        'status'
    ];
}
