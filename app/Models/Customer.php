<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['people_amount', 'table_id'];


    public function table()
    {
        return $this->hasMany(Table::class);
    }

}


