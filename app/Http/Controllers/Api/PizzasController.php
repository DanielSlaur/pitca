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

    public function show($id){
        $pizza = Pizzas::find($id);
        if(!$pizza){
            return response()->json([
                "status"=>false,
                "message"=>"Pizza not found"
            ])->setStatusCode(404);
        }

        return $pizza;
    }
}
