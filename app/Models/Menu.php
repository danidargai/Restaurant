<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Menu extends Model
{
   use HasFactory;
   protected $fillable =['name', 'price', 'type_id', 'drinks_id',]; 


public function type() {
    return $this->hasMany(Type::class);
}

public function drinks() {
    return $this->hasMany(Drinks::class);
}
}