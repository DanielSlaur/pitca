<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pizzas;
use Illuminate\Http\Request;

class PizzasController extends Controller
{
    public function index(){
        return Pizzas::all();
    }
}
