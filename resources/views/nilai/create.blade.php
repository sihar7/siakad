@extends('layouts/master')

@section('title', 'Tambah Nilai')
@section('header', 'Tambah Data Nilai')

@section('content')

<div class="row">
   <div class="col-md-12">
      <div class="card card-primary">
         <div class="card-header">
            <h3 class="card-title">Input Data Nilai {{ $class->nama }}</h3>
         </div>

         <form action="/grades/{{$class->id}}/{{$semester->id}}/create" method="get" class="ml-3 mt-3">
            <div class="row">
               <div class="col-md-3">
                  <div class="input-group mb-3">
                     <select name="subject" id="class_learn_id" class="form-control" required>
                        <option value="">Pilih mata pelajaran</option>
                        @foreach ($schedule->unique('class_learn_id') as $cl)
                        <option value="{{ $cl->class_learn_id}}"
                           {{ ($_GET) ? $_GET['subject'] == $cl->class_learn_id ? 'selected' : '' : '' }}>
                           {{ $cl->classLearn->subject->nama  }}
                        </option>
                        @endforeach
                     </select>
                     <div class="input-group-append">
                        <button type="submit" class="btn btn-success">Generate</button>
                     </div>
                  </div>
               </div>

            </div>
         </form>

         @if(isset($_GET['subject']))

         <form method="post" action="/grades" role="form">
            @csrf
            <div class="card-body">

               <table class="table">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nilai Tugas 1</th>
                        <th>Nilai Tugas 2</th>
                        <th>Nilai UTS</th>
                        <th>Nilai UAS</th>
                        <th>Tinggi Badan</th>
                        <th>Berat Badan</th>
                        <th>Aspek Fisik <br> Pendengaran <br> Penglihatan <br> Gigi</th>
                        <th>Prestasi</th>
                        <th>Ketidakhadiran <br> Sakit <br> Izin <br> Alpha</th>

                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($students as $s)
                     @php
                     $teacher= \App\Schedule::where('class_learn_id', '=', $_GET['subject'])->first();
                     @endphp
                     <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $s->nama }}</td>
                        <input type="hidden" name="class_room_id[]" value="{{$class->id}}">
                        <input type="hidden" name="semester_id[]" value="{{$semester->id}}">
                        <input type="hidden" name="class_student_id[]" value="{{$s->id}}">
                        <input type="hidden" name="teacher_id[]" value="{{ $teacher->teacher_id  }}">
                        <input type="hidden" name="student_id[]" value="{{$s->student_id}}">

                        <input type="hidden" name="class_learn_id" value="{{$_GET['subject']}}">
                        <td><input type="number" class="form-control" name="nilai_tugas_1[]"></td>
                        <td><input type="number" class="form-control" name="nilai_tugas_2[]"></td>
                        <td><input type="number" class="form-control" name="nilai_uts[]"></td>
                        <td><input type="number" class="form-control" name="nilai_uas[]"></td>
                        <td><input type="number" class="form-control" name="tinggibadan[]"></td>
                        <td><input type="number" class="form-control" name="beratbadan[]"></td>
                        <td><input type="text" class="form-control" name="pendengaran[]"> <br>
                            <input type="text" class="form-control" name="penglihatan[]"> <br>
                            <input type="text" class="form-control" name="gigi[]">
                        </td>
                        <td><input type="text" class="form-control" name="prestasi[]"></td>
                        <td><input type="number" class="form-control" name="sakit[]"> <br>
                            <input type="number" class="form-control" name="izin[]"> <br>
                            <input type="number" class="form-control" name="alpha[]">
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>

            </div>

            <div class="card-footer">
               <button type="submit" class="btn btn-primary">Tambah Data</button>
               <a href="/grades?kelas={{$class->id}}&semester={{$semester->id}}" class="btn btn-warning">Batal</a>
            </div>
         </form>
         @endif
      </div>
   </div>
</div>

@endsection

@section('script')
<script src="{{ asset('assets/js/script-input-edit.js') }}"></script>
{{-- <script type='text/javascript'>
   $(document).ready(function ($) {
      $('select[name=semester_id]').on('change', function () {
      var classId = $(".class_id").attr('value');
      var selected = $(this).find(":selected").attr('value');
         console.log(classId)
      $.ajax({
         url:'/getSemester/'+selected+'/'+classId,
         type: 'GET',
         dataType: 'json',
            }).done(function (data) {

               var select = $('select[name=class_learn_id]');
               select.empty();
               select.append('<option value="0" >Pilih mata pelajaran</option>');
               $.each(data,function(key, value) {
               select.append('<option value=' + value.id + '>' + value.subject.nama + '</option>');
            });
               // console.log("success");
         })
      });
   });



</script> --}}
@endsection
