<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Gcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::with('gcategory')->paginate(10);
        return view('gallery.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gallery = Gcategory::all();
        return view('gallery.create', compact('gallery'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasfile('image'))
        {
            foreach($request->file('image') as $key => $file)
            {
                $path = $file->store('gallery', 'public');
                // $name = $file->getClientOriginalName();

                $insert[$key]['gcategory_id'] = $request->input('category_id');
                $insert[$key]['created_at'] = date('Y-m-d H:i:s');
                $insert[$key]['image'] = $path;

            }
        }

        Gallery::insert($insert);

        return redirect()->route('gallery.index')
            ->with('success','Gallery yaratildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery= Gallery::find($id);
        Storage::disk('public')->delete($gallery->image);
        $gallery->delete();
        return back()->with('error', 'Image O`chirildi');
    }
}
