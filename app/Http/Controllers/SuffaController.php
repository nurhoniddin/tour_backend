<?php

namespace App\Http\Controllers;

use App\Models\Suffa;
use App\Models\SuffPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SuffaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $suffas = Suffa::latest()->paginate(10);
	    return view('suffa.index',compact('suffas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suffa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $file= new Suffa();

	    $img = $request->file('cover_image')->store('cover','public');


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

	    $file->save();

        $suff_id = DB::getPdo()->lastInsertId();

        if($request->hasfile('filenames'))
        {
            foreach($request->file('filenames') as $key => $file)
            {
                $path = $file->store('urik_fotos', 'public');
                // $name = $file->getClientOriginalName();

                $insert[$key]['suffa_id'] = $suff_id;
                $insert[$key]['created_at'] = date('Y-m-d H:i:s');
                $insert[$key]['suffa_photos'] = $path;

            }
        }

        SuffPhoto::insert($insert);

        return redirect()->route('suffa.index')
		    ->with('success','Maqola yaratildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suffa  $suffa
     * @return \Illuminate\Http\Response
     */
    public function show(Suffa $suffa)
    {
        return view('suffa.show',compact('suffa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suffa  $suffa
     * @return \Illuminate\Http\Response
     */
    public function edit(Suffa $suffa)
    {
        return view('suffa.edit',compact('suffa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suffa  $suffa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suffa $suffa)
    {
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

	    $suffa->title_uz = $request->title_uz;
	    $suffa->title_ru = $request->title_ru;
	    $suffa->title_en = $request->title_en;
	    $suffa->description_uz = $request->description_uz;
	    $suffa->description_ru = $request->description_ru;
	    $suffa->description_en = $request->description_en;
	    $suffa->content_uz = $request->content_uz;
	    $suffa->content_ru = $request->content_ru;
	    $suffa->content_en = $request->content_en;
	    $suffa->cover_image = $img;

	    $suffa->images = $sliderImageDataArray;

	    $suffa->save();
	    return redirect()->route('suffa.index')
		    ->with('success','Maqola yangilandi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suffa  $suffa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suffa $suffa)
    {
	    Storage::disk('public')->delete($suffa->cover_image);
	    $suffa->delete();
	    return back()->with('success','Malumot o\'chirildi');
    }
}
