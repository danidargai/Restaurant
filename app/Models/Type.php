<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Type extends Model
{
    use HasFactory;
    protected $fillable = ['soups','desserts'];



public function type_items() {
    return $this->hasMany(Menu::class);
}

}
