<?php

namespace App\Http\Controllers;

use App\Models\Investor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class InvestorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$invests = Investor::latest()->paginate(10);
        return view('investor.index',compact('invests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
	    return "worked";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function show(Investor $investor)
    {
        return view('investor.show',compact('investor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function edit(Investor $investor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Investor $investor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Investor $investor)
    {
        //
    }
}
