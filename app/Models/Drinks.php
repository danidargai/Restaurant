<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Drinks extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        
    ];
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
