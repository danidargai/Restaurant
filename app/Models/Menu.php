<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Menu extends Model
{
   use HasFactory;
   protected $fillable =['type_id', 'drinks_id',]; 


   public function type()
   {
       return $this->belongsTo(Type::class, 'type_id');
   }

   public function drinks()
   {
       return $this->belongsTo(Drinks::class, 'drinks_id');
   }

public $timestamps = false;
}