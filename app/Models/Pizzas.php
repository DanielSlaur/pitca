<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizzas extends Model
{
    use HasFactory;

    public function ordersPizzas(){
        return $this->hasMany(OrdersPizzas::class);
    }
}
