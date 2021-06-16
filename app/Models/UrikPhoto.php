<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrikPhoto extends Model
{
    use HasFactory;
    public function urik(){
        return $this->belongsTo(UrikPhoto::class);
    }
}
