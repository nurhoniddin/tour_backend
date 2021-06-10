<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        $gallery = Gallery::orderBy('id','DESC')->get();
        return response()->json(compact('gallery'));
    }

    public function gallerys($gcategory_id)
    {
        $details = Gallery::where('gcategory_id',$gcategory_id)->get();

        return response()->json(compact('details'));
    }
}
