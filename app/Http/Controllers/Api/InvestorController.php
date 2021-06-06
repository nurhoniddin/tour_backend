<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Investor;
use Illuminate\Http\Request;

class InvestorController extends Controller
{
	public function store(Request $request){
//		$request->validate([
//			'first_name' => 'required'
//		]);
		$data = new Investor();
		$data->first_name = $request->input('first_name');
		$data->last_name = $request->input('last_name');
		$data->email = $request->input('email');
		$data->phone = $request->input('phone');
		$data->country = $request->input('country');
		$data->place = $request->input('place');
		$data->message = $request->input('message');
//        dd($data);
		$data->save();
		return response()->json(compact('data'),201);
	}
}
