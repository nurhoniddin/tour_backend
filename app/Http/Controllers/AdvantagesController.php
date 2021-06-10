<?php

namespace App\Http\Controllers;

use App\Models\Advantages;
use App\Models\Category;
use Illuminate\Http\Request;

class AdvantagesController extends Controller
{
    public function index()
    {
        $advantages = Advantages::with('category')->latest()->paginate(10);
        return view('advantages.index',compact('advantages'));
    }

    public function create()
    {
        //Categories drop down start
        $categories = Category::where(['parent_id' => 0])->get();
        $categories_dropdown = "<option value='0' selected disabled>Kategoriyalar...</option>";
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
        //Categories drop down ends

        return view('advantages.create',compact('categories_dropdown'));
    }

    public function edit($id)
    {
        $advantages = Advantages::findOrFail($id);

        //Categories drop down start
        $categories = Category::where(['parent_id' => 0])->get();
        $categories_dropdown = "<option value='0' selected disabled>Kategoriyalar...</option>";
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
        //Categories drop down ends

        return view('advantages.edit',compact('advantages','categories_dropdown'));

    }

    public function update(Request $request, $id)
    {
        $data = Advantages::findOrFail($id);

        $data->content_uz = $request->content_uz;
        $data->content_ru = $request->content_ru;
        $data->content_en = $request->content_en;
        $data->category_id = $request->category_id;

        $data->save();

        return redirect()->route('advantages.index')->with('success','O`zgartirildi');
    }

    public function show(){

    }

    public function store(Request $request)
    {
        $data = new Advantages();

        $data->content_uz = $request->input('content_uz');
        $data->content_ru = $request->input('content_ru');
        $data->content_en = $request->input('content_en');
        $data->category_id = $request->input('category_id');

        $data->save();

        return redirect()->route('advantages.index')
            ->with('success', 'yaratildi');
    }

    public function destroy($id)
    {
        $post= Advantages::find($id);
        $post->delete();
        return back()->with('error','O`chirildi');
    }
}
