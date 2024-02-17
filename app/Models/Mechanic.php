<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Mechanic extends Model
{
    use HasFactory;

    protected $guarded = [];

   

    public function owners()
    {
        return $this->hasOneThrough(Owner::class, Car::class, 'mechanic_id','car_id','id','id');
    }

    public function car(): HasOne
    {
        return $this->hasOne(Car::class);
    }
}
