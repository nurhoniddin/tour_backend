<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_uz',
        'name_ru',
        'name_en',
        'position_uz',
        'position_ru',
        'position_en',
        'phone',
        'email',
        'image',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
