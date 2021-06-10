<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advantages extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_uz',
        'content_ru',
        'content_en',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
