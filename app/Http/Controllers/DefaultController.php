<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function getCourse(Request $request)
    {
        $courses = Course::where('semester_id',$request->semester_id)->get();
        return response()->json($courses);
    }
}
