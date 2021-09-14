<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\Student\EnrollCourse;
use App\Http\Controllers\Student\AuthController;
use App\Http\Controllers\Student\CourseRegistrationController;
use App\Http\Controllers\Student\EnrollCourseController;

Route::prefix('student')->name('student.')->group(function () {
    Route::get('login', [AuthController::class, 'studentLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'studentLoginProcess'])->name('login');

    // Auth
    Route::middleware(['auth:student'])->group(function () {
        Route::get('home', [AuthController::class, 'studentDashboard'])->name('dashboard');

        //My Course
        Route::get('enroll-course', [EnrollCourseController::class, 'enrollCourse'])->name('enroll-course');
        Route::get('my-course', [EnrollCourseController::class, 'myEnrolledCourses'])->name('my-course');
        Route::post('take-teacher/{course}', [EnrollCourseController::class, 'takeTeacher'])->name('take-teacher');
        Route::delete('remove-teacher/{course}', [EnrollCourseController::class, 'removeEnrolledCourse'])->name('remove-teacher');

        // Marks
        Route::get('marks', [MarkController::class, 'getMarksFromStudent'])->name('marks');

        //course registration
        Route::get('course-registration',[CourseRegistrationController::class,'index'])->name('course-registration.index');
        Route::get('course-registration/create',[CourseRegistrationController::class,'create'])->name('course-registration.create');
        Route::post('course-registration',[CourseRegistrationController::class,'store'])->name('course-registration.store');
    });
});
