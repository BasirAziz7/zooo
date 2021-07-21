<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
    use HasFactory;

    public function haiwan()
    {
        return $this->belongsTo(Haiwan::class);
    }  

    public function kedai()
    {
        return $this->belongsTo(Kedai::class);
    }
}
