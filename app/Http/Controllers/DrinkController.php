<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drinks;
class DrinkController extends Controller
{
    public function index(){
        return Drinks::all();
    }

    public function show(Drinks $drinks){
        
        return $drinks;
        
    }

    public function store(Request $request){
        return Drinks::create($request->validate([
            'name' => 'required',
            'price' => 'required',
        ]));
    }

    public function update(Request $request, Drinks $drinks){
        $drinks->update($request->validate([
            'name' => 'required',
            'price' => 'required',
        ]));
        return $drinks;
    }

    public function destroy(Drinks $drinks){
        $drinks->delete();
        return $drinks;
    }
}
