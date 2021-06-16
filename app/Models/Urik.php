<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urik extends Model
{
    use HasFactory;
    public function urikphoto(){
        return $this->hasMany(UrikPhoto::class);
    }
}
