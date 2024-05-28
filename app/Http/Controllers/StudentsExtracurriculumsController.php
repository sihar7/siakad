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

        $id = $request->extracurriculums;

        $semester = \App\Semester::find($semester_id);
        $class = \App\ClassRoom::find($class_id);
        $extracurriculums = \App\ExtraCurriculum::all();
        if ($request->all()) {

            $students_e = DB::table('class_students')->where('class_room_id', $class_id)
            ->join('students', 'students.id', '=', 'class_students.student_id')
            ->select('students.nama', 'students.id as student_id', 'class_students.*')
            ->where('students.status', 'siswa')
            ->whereNotExists(function ($query) use ($id, $semester_id) {
                $query->select(DB::raw(1))
                ->from('students_extracurriculums')
                ->whereRaw('students_extracurriculums.semester_id =' . $semester_id)
                ->whereRaw('students_extracurriculums.class_student_id = class_students.id')
                ->whereRaw('students_extracurriculums.extracurriculums_id ='.  $id);
            })
            ->get();
            // $students_e = DB::table('students_extracurriculums')->where('students_extracurriculums.class_room_id', $class_id)
            // ->join('extracurriculums', 'students_extracurriculums.extracurriculums_id', '=', 'extracurriculums.id')
            // ->join('class_students', 'students_extracurriculums.class_student_id', '=', 'class_students.id')
            // ->join('students', 'students.id', '=', 'class_students.student_id')
            // ->select('students.nama', 'students.id as student_id', 'class_students.*')
            // ->where('students.status', 'siswa')
            // ->whereNotExists(function ($query) use ($id, $semester_id) {
            //     $query->select(DB::raw(1))
            //         ->from('students_extracurriculums')
            //         ->whereRaw('students_extracurriculums.semester_id =' . $semester_id)
            //         ->whereRaw('students_extracurriculums.class_student_id = class_students.id')
            //         ->whereRaw('students_extracurriculums.extracurriculums_id ='.  $id);
            // })
            // ->get();
            return view('siswa_esktrakurrikuler.create', compact('class', 'semester', 'students_e', 'extracurriculums'));
        } else {
            return view('siswa_esktrakurrikuler.create', compact('class', 'extracurriculums', 'semester'));
        }
        // $classLearns = \App\ClassLearn::where('class_room_id', '=', $class_id)->where('semester_id', '=', $semester_id)->get();
    }

    public function store(Request $request)
    {
        // $cl = $request->class_learn_id;
        // $result_explode = explode(',', $cl);
        // echo "Model: " . $result_explode[0] . "<br />";
        // echo "Colour: " . $result_explode[1] . "<br />";
        // dd($result_explode[0]);
        $request->validate(
            [
                'nilai' => 'required',
            ]
        );

        foreach ($request->class_student_id as $key => $value) {
            // dd($value);
            StudentsExtracurriculums::create([
                'class_student_id' => $value,
                'extracurriculums_id' => $request->extracurriculums_id,
                'class_room_id' => $request->class_room_id[$key],
                'semester_id' => $request->semester_id[$key],
                'nilai' => $request->nilai[$key],
                'student_id' => $request->student_id[$key],
            ]);
        }
        return redirect('studentsextracurriculums?kelas=' . $request->class_room_id[$key] . '&semester=' . $request->semester_id[$key] . '')->with('status', 'Data nilai berhasil ditambah!');
    }

    public function edit(studentsextracurriculums $studentsextracurriculums)
    {
        $studentsextracurriculum = StudentsExtracurriculums::join('extracurriculums', 'students_extracurriculums.extracurriculums_id', '=', 'extracurriculums.id')
        ->select('students_extracurriculums.*', 'extracurriculums.name as name')
        ->where('students_extracurriculums.id', $studentsextracurriculums->id)
        ->first();
        return view('siswa_esktrakurrikuler.edit', compact('studentsextracurriculum'));
    }

    public function update(Request $request, studentsextracurriculums $studentsextracurriculums)
    {
        $studentsextracurriculum = StudentsExtracurriculums::find($studentsextracurriculums->id);
        $studentsextracurriculum->nilai = $request->nilai;
        $studentsextracurriculum->save();
        return redirect('studentsextracurriculums?kelas=' . $request->class_room_id . '&semester=' . $request->semester_id . '')->with('status', 'Data nilai berhasil diubah!');
    }
}
