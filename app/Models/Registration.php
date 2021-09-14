<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $fillable = ['semester_id','session_id','student_id','department_id','status'];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function items()
    {
        return $this->hasMany(CourseRegistration::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
