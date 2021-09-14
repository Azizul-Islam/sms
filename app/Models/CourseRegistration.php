<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRegistration extends Model
{
    use HasFactory;
    protected $fillable = ['registration_id','course_id','status'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
