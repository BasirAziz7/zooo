<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kedai extends Model
{
    use HasFactory;

    public function pembelians() 
    {
        return $this->hasMany(Pembelian::class);
    }

    public function kedais() 
    {
        return $this->hasMany(Kedai::class);
    }
}
