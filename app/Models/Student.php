<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
        $this->attributes['slug'] = Str::slug($value);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function admin()
    {
        return $this->belongsTo(DepartmentAdmin::class, 'admin_id');
    }

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}
