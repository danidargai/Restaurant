<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Menu;


class MenuController extends Controller
{
    
    public function store(Request $request){
        return Menu::create($request->validate([
            'name' => 'required',
            'price' => 'required',
            'type_id' => 'required',
            'drinks_id' => 'required',
        ]));
    }

    public function index(){
        return Menu::with(['type', 'drinks'])->get();
    }
    public function show(Menu $menu){
        $menu->update($request->validate([
            'name' => 'required',
            'price' => 'required',
            'type_id' => 'required',
            'drinks_id' => 'required',
        ]));
        return $menu;
    }

    public function destroy(Menu $menu){
        $menu->delete();
        return $menu;
    }
}
