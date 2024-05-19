<?php

namespace App\Http\Controllers;

use App\StudentsExtracurriculums;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsExtracurriculumsController extends Controller
{
    public function index(Request $request)
    {

        $classes = \App\ClassRoom::all();
        $semesters = \App\Semester::all();

        $students_e = StudentsExtracurriculums::join('extracurriculums', 'students_extracurriculums.extracurriculums_id', '=', 'extracurriculums.id')
        ->select(
            'students_extracurriculums.*',
            'extracurriculums.name',
            'extracurriculums.description'
        )
        ->where('class_room_id', $request->kelas)->where('semester_id', $request->semester)->get();

        return view('siswa_esktrakurrikuler.index', compact('classes', 'semesters', 'students_e'));
    }

    public function create($class_id, $semester_id, Request $request)
    {
        $id = $request->subject;

        $semester = \App\Semester::find($semester_id);
        $class = \App\ClassRoom::find($class_id);
        $extracurriculums = \App\ExtraCurriculum::all();

        $students_e = DB::table('students_extracurriculums')->where('class_room_id', $class_id)
        ->join('extracurriculums', 'students_extracurriculums.extracurriculums_id', '=', 'extracurriculums.id')
        ->join('class_students', 'students_extracurriculums.class_student_id', '=', 'class_students.id')
        ->join('students', 'students.id', '=', 'class_students.student_id')
        ->select('students.nama', 'students.id as student_id', 'class_students.*')
        ->where('students.status', 'siswa')
        ->whereNotExists(function ($query) use ($id, $semester_id) {
            $query->select(DB::raw(1))
                ->from('students_extracurriculums')
                ->whereRaw('students_extracurriculums.class_learn_id =' . $id)
                ->whereRaw('students_extracurriculums.semester_id =' . $semester_id)
                ->whereRaw('students_extracurriculums.class_student_id = class_students.id')
                ->whereRaw('students_extracurriculums.extracurriculums_id = extracurriculums.id');
        })
        ->get();
    return view('siswa_esktrakurrikuler.create', compact('class', 'semester', 'students_e', 'extracurriculums'));

        // $classLearns = \App\ClassLearn::where('class_room_id', '=', $class_id)->where('semester_id', '=', $semester_id)->get();
    }
}
