<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Urik;
use Illuminate\Http\Request;

class UrikController extends Controller
{
    public function index(){
    	$urik = Urik::with('urikphoto')->get();
//    	return response()->json(compact('urik'));
        dd($urik);
    }
}
