<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function index(){
    	$logo = Logo::all();
    	return response()->json(compact('logo'));
    }
}
