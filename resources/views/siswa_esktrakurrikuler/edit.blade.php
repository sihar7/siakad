@extends('layouts/master')

@section('title', 'Ubah Nilai Ekstra Kurikuler')
@section('header', 'Ubah Data Nilai Ekstra Kurikuler')

@section('content')

<div class="row">
   <div class="col-md-12">
      <div class="card card-success">
         <div class="card-header">
            <h3 class="card-title">Ubah Data Nilai Ekstra Kurikuler</h3>
         </div>

         <form method="post" action="/studentsextracurriculums/{{$studentsextracurriculum->id}}" role="form">
            @csrf
            @method('put')
            <div class="card-body">

               <input type="hidden" name="class_room_id" value="{{ $studentsextracurriculum->class_room_id }}">
               <input type="hidden" name="semester_id" value="{{ $studentsextracurriculum->semester_id }}">
               <input type="hidden" name="student_id" value="{{ $studentsextracurriculum->student_id }}">
               <input type="hidden" name="extracurriculums_id" value="{{ $studentsextracurriculum->extracurriculums_id }}">

               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="nama">Nama</label>
                     <input id="nama" class="form-control" type="text" name="nama"
                        value="{{ $studentsextracurriculum->classStudent->student->nama }}" readonly>
                  </div>

               </div>

               <div class="form-group col-md-6">
                  <label for="mapel">Ekstrakurikuler</label>
                  <input id="mapel" class="form-control" type="text" name="mapel"
                     value="{{ $studentsextracurriculum->name }}" readonly>
               </div>

               <div class="form-group col-md-6">
                <label for="nilai">Nilai</label>
                <input id="nilai" class="form-control" type="text" name="nilai"
                   value="{{ $studentsextracurriculum->nilai }}">
             </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
               <button type="submit" class="btn btn-success">Ubah Data</button>
               <a href="/studentsextracurriculums?kelas={{$studentsextracurriculum->class_room_id}}&semester={{$studentsextracurriculum->semester_id}}" class="btn
               btn-warning">Batal</a>
            </div>
         </form>
      </div>
   </div>
</div>

@endsection

@section('script')
<script src="{{ asset('assets/js/script-input-edit.js') }}"></script>
@endsection
