<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Haiwan extends Model
{
    use HasFactory;

    public function pembelians() 
    {
        return $this->hasMany(Pembelian::class);
    }
 
    public function kedai() 
    {
        return $this->belongsTo(Kedai::class);
    }
    

}


