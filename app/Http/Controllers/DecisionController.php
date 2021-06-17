<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
		$decisions = Decision::with('category')->latest()->paginate(10);
		return view('decision.index', compact('decisions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//Categories drop down start
		$categories = Category::where(['parent_id' => 0])->get();
		$categories_dropdown = "<option value='0' selected>Kategoriyalar...</option>";
		foreach ($categories as $cat) {
			$categories_dropdown .= "<option value='" . $cat->id . "'>" . $cat->name_uz . "</option>";
			$sub_categories = Category::where(['parent_id' => $cat->id])->get();
			foreach ($sub_categories as $sub_cat) {
				$categories_dropdown .= "<option value='" . $sub_cat->id . "'>&nbsp;--------&nbsp;" . $sub_cat->name_uz . "</option>";
				$sub_cat = Category::where(['parent_id' => $sub_cat->id])->get();
				foreach ($sub_cat as $sub_cat) {
					$categories_dropdown .= "<option value='" . $sub_cat->id . "'>&nbsp;-------------------&nbsp;" . $sub_cat->name_uz . "</option>";
				}
			}
		}
		return view('decision.create',compact('categories_dropdown'));
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
		$data->category_id = $request->input('category_id');
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
	public function show($category_id)
	{
        $decisions = Decision::where('category_id',$category_id)->with('category')->latest()->paginate(10);
        return view('decision.index', compact('decisions'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param \App\Models\Decision $decision
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Decision $decision)
	{
		//Categories drop down start
		$categories = Category::where(['parent_id' => 0])->get();
		$categories_dropdown = "<option value='0' selected>Kategoriyalar...</option>";
		foreach ($categories as $cat) {
			$categories_dropdown .= "<option value='" . $cat->id . "'>" . $cat->name_uz . "</option>";
			$sub_categories = Category::where(['parent_id' => $cat->id])->get();
			foreach ($sub_categories as $sub_cat) {
				$categories_dropdown .= "<option value='" . $sub_cat->id . "'>&nbsp;--------&nbsp;" . $sub_cat->name_uz . "</option>";
				$sub_cat = Category::where(['parent_id' => $sub_cat->id])->get();
				foreach ($sub_cat as $sub_cat) {
					$categories_dropdown .= "<option value='" . $sub_cat->id . "'>&nbsp;-------------------&nbsp;" . $sub_cat->name_uz . "</option>";
				}
			}
		}
		return view('decision.edit',compact('decision','categories_dropdown'));

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
		$decision->category_id = $request->category_id;
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
