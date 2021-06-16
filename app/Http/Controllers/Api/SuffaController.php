<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Suffa;
use Illuminate\Http\Request;

class SuffaController extends Controller
{
    public function index(){
        $suffa = Suffa::with('suffphoto')->get();
        return response()->json($suffa);
//        dd($suffa);
    }
}
