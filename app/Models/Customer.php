<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $filleable = ['people_amount', 'tabel_id'];

    public function tabel(){
        return $this->belongsTo(Tabel::class, 'table_id');
    }
}
