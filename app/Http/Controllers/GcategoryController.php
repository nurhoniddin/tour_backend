<?php

namespace App\Http\Controllers;

use App\Models\Gcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GcategoryController extends Controller
{
    public function index()
    {
        $gcategory = Gcategory::latest()->paginate(10);
        return view('gcategory.index', compact('gcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Gcategory();

        $data->name_uz  = $request->input('name_uz');
        $data->name_ru  = $request->input('name_ru');
        $data->name_en  = $request->input('name_en');

        $imagePath = request('image')->store('gcategory','public');
        $data->image = $imagePath;

        $data->save();

        return redirect()->route('gcategory.index')
            ->with('success','Kategory yaratildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gcategory  $gcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Gcategory $gcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gcategory  $gcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gcategory= Gcategory::findOrFail($id);

        return view('gcategory.edit',compact('gcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gcategory  $gcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Gcategory::find($id);
        if($request->hasFile('image')){
            $path = $request->file('image')->store('gcategory','public');
            $post->image = $path;
        }

        $post->name_uz  = $request->input('name_uz');
        $post->name_ru  = $request->input('name_ru');
        $post->name_en  = $request->input('name_en');
        $post->save();

        return redirect()->route('gcategory.index')
            ->with('success','Kategory O`zgartirildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gcategory  $gcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gcategory= Gcategory::find($id);
        Storage::disk('public')->delete($gcategory->image);
        $gcategory->delete();
        return back()->with('error','Kategory O`chirildi');
    }
}
