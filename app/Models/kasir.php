<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kasir extends Model
{
    protected $guarded = [];

    public function kasir(){
        return $this->belongsTo(kasir::class);
    }
}
 