<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Restaurant;
use App\Models\Delivery;
use App\Models\User;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['restaurant_id', 'user_id', 'total_cost', 'order_time', 'status'];

    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }

    public function delivery() {
        return $this->hasOne(Delivery::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
