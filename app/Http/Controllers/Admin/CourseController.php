<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Session;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $semesters = Semester::latest()->get();
        $sessions = Session::latest()->get();
        return view('Admin.course',compact('semesters','sessions'));
    }
    function courseFetch()
    {
        return Course::with('semester')->latest()->get();
    }
    function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'code' => 'required',
            'credit' => 'required',
            'semester_id' => 'required',
            'session_id' => 'required',
        ]);
        Course::create($request->all());
    }

    public function destroy(Course $course)
    {
        $course->delete();
    }
    public function show(Course $course)
    {
        return $course;
    }
    public function update(Request $request, Course $course)
    {
        $course->update($request->all());
    }


    
}
