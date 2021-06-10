<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gcategory;
use Illuminate\Http\Request;

class GcategoryController extends Controller
{
    public function index(){
        $gcategory = Gcategory::orderBy('id','DESC')->get();
        return response()->json(compact('gcategory'));
    }
}
