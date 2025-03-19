<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
class TableController extends Controller
{
    public function index(){
       return Table::all();
    }   

    public function store(Request $request){
        return Table::create($request->validate([
            'chairs' => 'required',
            'reservation' => 'required',
        ]));
    }

    public function show(Table $table){
        return $table->load('customers');
    }

    public function update(Request $request, Table $table){
        $table->update($request->validate([
            'chairs' => 'required',
            'reservation' => 'required',
        ]));
        return $table;
    }

    public function destroy(Table $table){
        return $table->delete();
    }
    public function roles (){
        return $this->belongsToMany( Table::class); 
    }


    
}
