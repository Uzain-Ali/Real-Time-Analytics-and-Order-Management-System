<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Order;

class Delivery extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'driver_id', 'delivery_time', 'estimated_duration'];

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
