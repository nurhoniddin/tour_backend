<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index($category_id)
    {
        $staff = Staff::where(['category_id' => $category_id])->get();

        return response()->json(compact('staff'));
    }
}
