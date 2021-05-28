<?php

namespace App\Http\Controllers;

use App\Models\Decision;
use Illuminate\Http\Request;

class DecisionController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$decisions = Decision::latest()->paginate(10);
		return view('decision.index', compact('decisions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('decision.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(Request $request)
	{
		$data = new Decision();
		$data->title_uz = $request->input('title_uz');
		$data->title_ru = $request->input('title_ru');
		$data->title_en = $request->input('title_en');
		$data->link_uz = $request->input('link_uz');
		$data->link_ru = $request->input('link_ru');
		$data->link_en = $request->input('link_en');
		$data->save();
		return redirect()->route('decision.index')
			->with('success', 'Qaror qo\'shildi');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param \App\Models\Decision $decision
	 * @return \Illuminate\Http\Response
	 */
	public function show(Decision $decision)
	{
		return view('decision.show',compact('decision'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param \App\Models\Decision $decision
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Decision $decision)
	{
		return view('decision.edit',compact('decision'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Models\Decision $decision
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(Request $request, Decision $decision)
	{
		$decision->title_uz = $request->input('title_uz');
		$decision->title_ru = $request->input('title_ru');
		$decision->title_en = $request->input('title_en');
		$decision->link_uz = $request->input('link_uz');
		$decision->link_ru = $request->input('link_ru');
		$decision->link_en = $request->input('link_en');
		$decision->save();
		return redirect()->route('decision.index')
			->with('success', 'Qaror Yangilandi');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Models\Decision $decision
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy(Decision $decision)
	{
		$decision->delete();
		return redirect()->route('decision.index')
			->with('success', 'Qaror O\'chirildi');
	}
}
