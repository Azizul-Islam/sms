<?php

namespace App\Http\Controllers;

use App\Models\EnrollCourse;
use App\Models\StudentMark;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    public function getMarksFromTeacher()
    {
        $courses = EnrollCourse::whereTeacherId(auth('teacher')->id())->latest()->get();
        return view('Teacher.marks', compact('courses'));
    }

    public function assignMarksFromTeacher(EnrollCourse $course)
    {
        return view('Teacher.assign-marks', compact('course'));
    }

    function assignMarks(Request $request, EnrollCourse $course)
    {
        $request->validate([
            'marks' => ['required', 'numeric']
        ]);
        if($request->marks >= 0 && $request->marks <= 39){
            $gpa = 0.00;
            $grade = 'F';
        }
        elseif($request->marks >= 40 && $request->marks<=44){
            $gpa = 2.00;
            $grade = 'D';
        }
        elseif($request->marks >= 45 && $request->marks<=49){
            $gpa = 2.25;
            $grade = 'C';   
        }
        elseif($request->marks >= 50 && $request->marks<=54){
            $gpa = 2.50;
            $grade = 'C+';
        }
        elseif($request->marks >= 55 && $request->marks<=59){
            $gpa = 2.75;
            $grade = 'B-';
        }
        elseif($request->marks >= 60 && $request->marks<=64){
            $gpa = 3.00;
            $grade = 'B';   
        }
        elseif($request->marks >= 65 && $request->marks<=69){
            $gpa = 3.25;
            $grade = 'B+';
        }
        elseif($request->marks >= 70 && $request->marks<=74){
            $gpa = 3.50;
            $grade = 'A-';
        }
        elseif($request->marks >=75 && $request->marks<=79){
            $gpa = 3.75;
            $grade = 'A';
        }
        elseif($request->marks >=80 && $request->marks<=100){
            $gpa = 4.00;
            $grade = 'A+';
        }

        StudentMark::create([
            'course_id' => $course->course_id,
            'teacher_id' => auth('teacher')->id(),
            'student_id' => $course->student_id,
            'session_id' => $course->session_id,
            'semester_id' => $course->semester_id,
            'marks' => $request->marks,
            'gpa' => $gpa,
            'grade' => $grade
        ]);

        $this->setSuccessMessage("Assign marks of ({$course->course->name}) this course. Marks is {$request->marks}");
        return redirect()->route('teacher.marks');
    }

    function editAssignMarksFromTeacher(EnrollCourse $course)
    {

        $marks =  $this->getMarks($course);
        return view('Teacher.assign-marks-edit', compact('course', 'marks'));
    }


    protected function getMarks($course)
    {
        $m = StudentMark::select('id', 'marks')->whereTeacherId(auth('teacher')->id())
            ->whereCourseId($course->course_id)
            ->whereSemesterId($course->semester_id)
            ->whereSessionId($course->session_id)
            ->whereStudentId($course->student_id)
            ->first();

        return $m;
    }

    function updateMarks(Request $request, StudentMark $student_mark)
    {
        $request->validate([
            'marks' => ['required', 'numeric']
        ]);

        if($request->marks >= 0 && $request->marks <= 39){
            $gpa = 0.00;
            $grade = 'F';
        }
        elseif($request->marks >= 40 && $request->marks<=44){
            $gpa = 2.00;
            $grade = 'D';
        }
        elseif($request->marks >= 45 && $request->marks<=49){
            $gpa = 2.25;
            $grade = 'C';   
        }
        elseif($request->marks >= 50 && $request->marks<=54){
            $gpa = 2.50;
            $grade = 'C+';
        }
        elseif($request->marks >= 55 && $request->marks<=59){
            $gpa = 2.75;
            $grade = 'B-';
        }
        elseif($request->marks >= 60 && $request->marks<=64){
            $gpa = 3.00;
            $grade = 'B';   
        }
        elseif($request->marks >= 65 && $request->marks<=69){
            $gpa = 3.25;
            $grade = 'B+';
        }
        elseif($request->marks >= 70 && $request->marks<=74){
            $gpa = 3.50;
            $grade = 'A-';
        }
        elseif($request->marks >=75 && $request->marks<=79){
            $gpa = 3.75;
            $grade = 'A';
        }
        elseif($request->marks >=80 && $request->marks<=100){
            $gpa = 4.00;
            $grade = 'A+';
        }
        $student_mark->marks = $request->marks;
        $student_mark->gpa = $gpa;
        $student_mark->grade = $grade;
        $student_mark->save();
        $this->setSuccessMessage("Mark Has Updated!");
        return redirect()->route('teacher.marks');
    }

    // Student

    public function getMarksFromStudent()
    {
        $courses = StudentMark::without('student')->whereStudentId(auth('student')->id())->latest()->get();
        return view('Student.marks', compact('courses'));
    }
}
