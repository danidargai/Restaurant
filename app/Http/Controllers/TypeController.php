<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index(){
        return Type::all();
    }

    public function store(Request $request){
        return Type::create($request->validate([
            'name' => 'required',
            'price' => 'required',
        
        ]));
    }

    public function show(Type $type){
        return $type;
    }
    public function update(Request $request, Type $type){
        $type->update($request->validate([
            
            'price' => 'required',
        ]));
        return $type;
    }

    public function destroy(Type $type){
        $type->delete();
        return $type;
    }

}
