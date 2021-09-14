<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['name','code','credit','semester_id'];


    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class,'semester_id');
    }
}
