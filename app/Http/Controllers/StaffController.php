<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::with('category')->latest()->paginate(10);
        return view('staff.index',compact('staff'));
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

        return view('staff.create',compact('categories_dropdown'));
    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);

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

        return view('staff.edit',compact('staff','categories_dropdown'));

    }

    public function update(Request $request, $id)
    {
        $data = Staff::findOrFail($id);

        $data->name_uz = $request->name_uz;
        $data->name_ru = $request->name_ru;
        $data->name_en = $request->name_en;
        $data->position_uz = $request->position_uz;
        $data->position_ru = $request->position_ru;
        $data->position_en = $request->position_en;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $imagePath = request('image')->store('staff_images', 'public');
            $data->image = $imagePath;
        }

        $data->save();

        return redirect()->route('staff.index')->with('success',' O`zgartirildi');
    }

    public function show($id){
        $staff = Staff::findOrFail($id);
        return view('staff.show',compact('staff'));
    }

    public function store(Request $request)
    {

        $data = new Staff();

        $data->name_uz = $request->input('name_uz');
        $data->name_ru = $request->input('name_ru');
        $data->name_en = $request->input('name_en');
        $data->position_uz = $request->input('position_uz');
        $data->position_ru = $request->input('position_ru');
        $data->position_en = $request->input('position_en');
        $data->phone = $request->input('phone');
        $data->email = $request->input('email');
        $data->category_id = $request->input('category_id');

        if ($request->hasFile('image')) {
            $imagePath = request('image')->store('staff_images', 'public');
            $data->image = $imagePath;
        }

        $data->save();

        return redirect()->route('staff.index')
            ->with('success', 'yaratildi');
    }

    public function destroy($id)
    {
        $staff= Staff::find($id);
        Storage::disk('public')->delete($staff->image);
        $staff->delete();
        return back()->with('error',' O`chirildi');
    }
}
