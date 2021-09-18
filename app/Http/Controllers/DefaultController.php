<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Notice;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function getCourse(Request $request)
    {
        $courses = Course::where('semester_id',$request->semester_id)->get();
        return response()->json($courses);
    }

    public function notice()
    {
        $notices = Notice::where('department_id',auth('student')->user()->department_id)->get();
        return view('Student.notices.index',compact('notices'));
    }

    public function getRegCourse(Request $request)
    {
        $courses = Course::where(['session_id'=>$request->session_id,'semester_id'=>$request->semester_id])->get();
        return response()->json($courses);
    }
}
