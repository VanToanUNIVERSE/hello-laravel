<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['price', 'status', 'payment_method', 'payment_status', 'address', 'phone', 'user_id'];
    public function orderItems()
    {
        return $this->hasMany(Order_Item::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
