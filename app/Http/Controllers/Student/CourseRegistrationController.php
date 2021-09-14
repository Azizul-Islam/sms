<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\CourseRegistration;
use App\Models\Registration;
use App\Models\Semester;
use App\Models\Session;
use Illuminate\Http\Request;

class CourseRegistrationController extends Controller
{
    public function index()
    {
        $data['registrations'] = Registration::where('student_id',auth()->user()->id)->latest()->get();
        return view('student.registration.index',$data);
    }
    public function create()
    {
        $data['sessions'] = Session::latest()->get();
        $data['semesters'] = Semester::latest()->get();
        return view('student.registration.create',$data);
    }

    public function store(Request $request)
    {
        $reg = Registration::create($request->all());
        foreach($request->course_id as $i=>$item){
            $course_reg = new CourseRegistration();
            $course_reg->registration_id = $reg->id;
            $course_reg->course_id = $request->course_id[$i];
            $course_reg->save();
            
        }
        return redirect()->route('student.course-registration.index')->with('success','Registration successfully');

    }
}
