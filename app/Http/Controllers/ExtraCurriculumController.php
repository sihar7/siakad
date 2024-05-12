<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExtraCurriculum;

class ExtraCurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ekstrakurikuler.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ekstrakurikuler.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:extracurriculums|max:255',
            'description' => 'required'
        ]);

        ExtraCurriculum::create([
            "name"  =>  $request->name,
            "description" => $request->description
        ]);
        // $new = new ExtraCurriculum;
        // $new->name = $request->name;
        // $new->description = $request->description;
        // $new->save();

        return redirect('/extracurriculum')->with('status', 'Data Ekstrakurikuler berhasil ditambah');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(ExtraCurriculum $extracurriculum)
    {
        return view('ekstrakurikuler.edit', compact('extracurriculum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExtraCurriculum $extracurriculum)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $ExtraCurriculum = ExtraCurriculum::find($extracurriculum->id);
        $ExtraCurriculum->update($request->all());
        $ExtraCurriculum->save();
        return redirect('/extracurriculum')->with('status', 'Data Ekstrakurikuler berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExtraCurriculum $extracurriculum)
    {
        ExtraCurriculum::destroy($extracurriculum->id);
        return redirect('/extracurriculum')->with('status', 'Data Ekstrakurikuler berhasil dihapus!');
    }

    public function getdataextracurriculum()
    {
        $ExtraCurriculum = ExtraCurriculum::select('extracurriculums.*');

        return \DataTables::eloquent($ExtraCurriculum)
            ->addIndexColumn()
            ->addColumn('aksi', function ($s) {
                return '
                <a href="/extracurriculum/' . $s->id . '/edit" class="btn btn-warning btn-sm">edit</a>
                <form action="/extracurriculum/' . $s->id . '" method="post" class="d-inline delete">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger delete btn-sm">hapus</button>
                </form>';
            })
            ->addColumn('description', function($s){
                return htmlspecialchars_decode($s->description);
            })
            ->rawColumns(['aksi', 'description'])
            ->tojson();
    }
}
