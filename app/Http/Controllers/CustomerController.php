<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(){
        return Customer::with('table')->get();
    }

    public function store(Request $request){
        return Customer::create($request->validate([
            'people_amount' => 'required',
            'table_id' => 'required',
        ]));
    }

    public function update(Request $request, Customer $customer){
        $customer->update($request->validate([
            'people_amount' => 'required',
            'table_id' => 'required',
        ]));
        return $customer;
    }

    public function destroy(Customer $customer){
        $customer->delete();
    }
}
