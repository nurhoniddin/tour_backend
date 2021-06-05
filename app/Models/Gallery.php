<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'gcategory_id'
    ];

    public function gcategory()
    {
        return $this->belongsTo('App\Models\Gcategory');
    }
}
