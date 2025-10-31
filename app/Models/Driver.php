<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Delivery;

class Driver extends Model
{
    use HasFactory;

    // Mass assignable fields
    protected $fillable = [
        'name',
    ];

    /**
     * A driver can have many deliveries.
     */
    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }
}
