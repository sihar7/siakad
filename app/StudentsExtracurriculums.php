<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentsExtracurriculums extends Model
{
    protected $guarded = [];
    protected $table = 'students_extracurriculums';
    public $timestamps = false;

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function classStudent()
    {
        return $this->belongsTo(ClassStudent::class);
    }

    public function ExtraCurriculum()
    {
        return $this->belongsTo(ExtraCurriculum::class);
    }
}
