<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function rental(){
        return $this->hasMany(Rental::class);
    }

    public function customer_detail(){
        return $this->hasOne(CustomerDetail::class);
    }
    


    /**
     * Chekcing the user role
     */
    public static function isCustomer(User $user){
        if($user->role === 'customer'){
            return true;
        }
        return false;
    }

    /**
     * Chekcing the user role
     */
    public static function isAdmin(User $user){
        if($user->role === 'admin'){
            return true;
        }
        return false;
    }
}
