<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Dish;
use App\Models\Order;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'location', 'rating'];

    public function dishes() {
        return $this->hasMany(Dish::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
