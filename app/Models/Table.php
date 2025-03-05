<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Table extends Model
{
    use HasFactory;

    protected $fillable = ['chairs','reservation'];


public function customers()
{
    return $this->hasMany(Customers::class);
}
}