<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\OrdersPizzas;
use Illuminate\Http\Request;
use Validator;
class OrdersController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'name'=> ['required'],
                'phone' => ['required'],
                'address' => ['required'],
                'paymentMethod' => ['required'],
                'totalPrice' => ['required'],
                'pizzasIds' => ['required']
            ]
        );

        if($validator->fails()){
            return response()->json([
                "status"=>false,
                "message"=>$validator->messages()
            ])->setStatusCode(400);
        }

        $order = Orders::create([
            'customerName'=> $request->name,
            'customerPhone' => $request->phone,
            'customerAddress' => $request->address,
            'paymentMethod' => $request->paymentMethod,
            'totalPrice' => $request->totalPrice
        ]);

        foreach ($request->pizzasIds as $value) {
            OrdersPizzas::create([
                'orders_id' => $order->id,
                'pizzas_id' => $value
            ]);
        }

        return [
            "status"=>true,
            "order" => $order
        ];
    }
}
