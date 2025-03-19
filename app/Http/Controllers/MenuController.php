<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Type;
use App\Models\Drinks;


class MenuController extends Controller
{
    
    public function store(Request $request){
        return Menu::create($request->validate([
            'name' => 'required',
            'type_id' => 'required',
            'drinks_id' => 'required',
            
            
        ]));
    }

    public function index(){
        return Menu::with(['type', 'drinks'])->get();
    }
    public function show(Menu $menu){
        $menu->update($request->validate([
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
