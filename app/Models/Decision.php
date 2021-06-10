<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
    use HasFactory;
	protected $fillable = [
		'title_uz',
		'title_ru',
		'title_en',
		'link_uz',
		'link_ru',
		'link_en',
	];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
