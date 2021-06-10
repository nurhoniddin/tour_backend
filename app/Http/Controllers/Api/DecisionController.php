<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Decision;
use Illuminate\Http\Request;

class DecisionController extends Controller
{
    public function index($category_id)
    {
        $decision = Decision::where(['category_id' => $category_id])->get();

        return response()->json(compact('decision'));
    }
}
