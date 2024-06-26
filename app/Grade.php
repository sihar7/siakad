<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $guarded = [];

    public function classLearn()
    {
        return $this->belongsTo(ClassLearn::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function classStudent()
    {
        return $this->belongsTo(ClassStudent::class);
    }



    // public function schedule()
    // {
    //     return $this->hasMany(Schedule::class);
    // }
}
