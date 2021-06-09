<?php

namespace App\Http\Controllers;

use App\Models\Urik;
use File;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UrikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$uriks = Urik::latest()->paginate(10);

		return view('urik.index',compact('uriks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('urik.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $file= new Urik();

	    $img = $request->file('cover_image')->store('cover_image','public');
	    $files = [];
	    if ($request->hasfile('filenames')) {

		    foreach ($request->file('filenames') as $myimg) {

//			    $name = time() . rand(1, 100) . '.' . $myimg->extension();
//
//			    $myimg->move(public_path('files'), $name);
			    $name = $myimg->store('uriklisoy','public');

			    $files[] = $name;

		    }

	    }
	    $sliderImageDataArray = implode("",$files);
	    $file->title_uz = $request->title_uz;
	    $file->title_ru = $request->title_ru;
	    $file->title_en = $request->title_en;
	    $file->description_uz = $request->description_uz;
	    $file->description_ru = $request->description_ru;
	    $file->description_en = $request->description_en;
	    $file->content_uz = $request->content_uz;
	    $file->content_ru = $request->content_ru;
	    $file->content_en = $request->content_en;
	    $file->cover_image = $img;

	    $file->images = $sliderImageDataArray;

	    $file->save();
	    return redirect()->route('urik.index')
		    ->with('success','Maqola yaratildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Urik  $urik
     * @return \Illuminate\Http\Response
     */
    public function show(Urik $urik)
    {
        return view('urik.show',compact('urik'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Urik  $urik
     * @return \Illuminate\Http\Response
     */
    public function edit(Urik $urik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Urik  $urik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Urik $urik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Urik  $urik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Urik $urik)
    {
	    Storage::disk('public')->delete($urik->cover_image);
		$urik->delete();
		return back()->with('success','Malumot o\'chirildi');
    }
}
