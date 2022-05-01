<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Validator;

class OrdersController extends Controller
{
    // index
    public function index(){
        $orders = Order::all();
        return [
            'data' => $orders
        ];
    }
    
    // show
    public function show($id){
        $orders = Order::find($id);
        return ['data' => $orders];
    }

    // create
    public function create(Request $req){
        if($req->isMethod('post')){
            $ordersData = $req;
            $rules = [
                'product_id' => 'required',
                'customer_id' => 'required',
                'price' => 'required',
            ];
            $validator = Validator::make($ordersData->all(), $rules);
            if($validator->fails()){
                return response()->json([
                    'data' => [
                        'error' => $validator->errors()
                    ]
                ], 422);
            }

            $orders = new Order;
            $orders->product_id =  $ordersData->product_id;
            $orders->customer_id =  $ordersData->customer_id;
            $orders->price =  $ordersData->price;
            
            $orders->save();
            return response()->json([
                'data' => [
                    'message' => 'New Order created',
                    'data' => $orders
                ]
            ], 201);
        }
    }

    // update
    public function update($id, Request $req){
        if($req->IsMethod('put')){
            $ordersData = $req;
            $rules = [
                'product_id' => 'required',
                'customer_id' => 'required',
                'price' => 'required',
            ];
            $validator = Validator::make($ordersData->all(), $rules);
            if($validator->fails()){
                return response()->json([
                    'data' => [
                        'error' => $validator->errors()
                    ]
                ], 422);
            }

            $orders = Order::find($id);
            $orders->product_id =  $ordersData->product_id;
            $orders->customer_id =  $ordersData->customer_id;
            $orders->price =  $ordersData->price;
            
            $orders->save();
            return response()->json([
                'data' => [
                    'message' => 'Order successfully updated',
                    'data' => $orders
                ]
            ], 201);
            
        }
    }
}
