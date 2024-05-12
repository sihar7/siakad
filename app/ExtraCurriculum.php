<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtraCurriculum extends Model
{
    protected $table = 'extracurriculums';
    protected $fillable = ['name', 'description'];
    public $timestamps = false;
}
