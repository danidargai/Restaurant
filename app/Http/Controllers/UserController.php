<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return response()->json(Customer::all(),200);
    }

    public function show($id){
        $customer = Customer::find($id);
        if (!$customer){
            return response()->json(['message' => 'Customer not found'],404);
        }
        return response()->json($customer,200);
    }

    public function store(Request $request){
        $request->validate([
            'people_amount' => 'required|integer',
            'tabel_id' => 'required|integer'
        ]);

        $customer = Customer::create($request->all());
        return response()->json($customer,201);
}

public function update(Request $request, $id){
    $customer = Customer::find($id);
    if (!$customer){
        return response()->json(['message' => 'Customer not found'],404);
    }
    
    $request->validate([
        'people_amount' => 'required|integer',
        'tabel_id' => 'integer|exists:tabels,id'
    ]);

    $customer->update($request->all());
    return response()->json($customer,200);
}

public function delete($id){
    $customer = Customer::find($id);
    if (!$customer){
        return response()->json(['message' => 'Customer not found'],404);
    }
    $customer->delete();
    return response()->json(['message' => 'Customer deleted'],200);
}
}