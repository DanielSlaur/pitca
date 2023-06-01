<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersPizzas extends Model
{
    use HasFactory;

    protected $fillable = ['orders_id', 'pizzas_id'];

    public function orders(){
        return $this->belongsTo(Orders::class);
    }

    public function pizzas(){
        return $this->belongsTo(Pizzas::class);
    }
}
