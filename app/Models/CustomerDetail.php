<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDetail extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'user_id',
        'rental_history'
    ];
}
