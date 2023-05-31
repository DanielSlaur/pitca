<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected  $fillable =[
        'customerName',
        'customerPhone',
        'customerAddress',
        'paymentMethod',
        'totalPrice'
    ];

    public function ordersPizzas(){
        return $this->hasMany(OrdersPizzas::class);
    }
}
