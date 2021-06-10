<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Advantages;
use Illuminate\Http\Request;

class AdvantagesController extends Controller
{
    public function index($category_id)
    {
        $advantages = Advantages::where(['category_id' => $category_id])->get();

        return response()->json(compact('advantages'));
    }
}
