<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Validator;

class CustomersController extends Controller
{
    // index
    public function index(){
        $customers = Customer::all();
        return ['data' => $customers];
        
    }

    // show
    public function show($id){
        $customers = Customer::find($id);
        return ['data' => $customers];
    }

    // create
    public function create(Request $req){
        if($req->isMethod('post')){
            $customerData = $req;
            $rules = [
                'first_name' => 'required',
                'last_name' => 'required',
                'email_address' => 'required',
                'mobile_number' => 'required',
                'address' => 'required',
                'status' => 'required'
            ];
            $validator = Validator::make($customerData->all(), $rules);
            if($validator->fails()){
                return response()->json([
                    'data' => [
                        'error' => $validator->errors()
                    ]
                ], 422);
            }

            $customers = new Customer;
            $customers->first_name =  $customerData->first_name;
            $customers->last_name =  $customerData->last_name;
            $customers->email_address =  $customerData->email_address;
            $customers->mobile_number =  $customerData->mobile_number;
            $customers->address =  $customerData->address;
            $customers->status =  $customerData->status;
            
            $customers->save();
            return response()->json([
                'data' => [
                    'message' => 'New Customer created',
                    'data' => $customers
                ]
            ], 201);
        }
    }

    // update
    public function update($id, Request $req){
        if($req->IsMethod('put')){
            $customerData = $req;
            
            $rules = [
                'first_name' => 'required',
                'last_name' => 'required',
                'email_address' => 'required',
                'mobile_number' => 'required',
                'address' => 'required',
                'status' => 'required'
            ];
            $validator = Validator::make($customerData->all(), $rules);
            if($validator->fails()){
                return response()->json([
                    'data' => [
                        'error' => $validator->errors()
                    ]
                ], 422);
            }

            $customers = Customer::find($id);
            $customers->first_name =  $customerData->first_name;
            $customers->last_name =  $customerData->last_name;
            $customers->email_address =  $customerData->email_address;
            $customers->mobile_number =  $customerData->mobile_number;
            $customers->address =  $customerData->address;
            $customers->status =  $customerData->status;
            
            $customers->save();
            return response()->json([
                'data' => [
                    'message' => 'Customer successfully updated',
                    'data' => $customers
                ]
            ], 201);
        }
    }
}
