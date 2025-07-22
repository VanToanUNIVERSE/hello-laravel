<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['username', 'password', 'fullName', 'phone', 'address', 'image', 'email', 'role'];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

