@extends('layouts/master')

@section('title', 'Tambah Nilai Ekstra Kurikuler')
@section('header', 'Tambah Data Nilai Ekstra Kurikuler')

@section('content')

<div class="row">
   <div class="col-md-12">
      <div class="card card-primary">
         <div class="card-header">
            <h3 class="card-title">Input Data Nilai Ekstra Kurikuler {{ $class->nama }}</h3>
         </div>

         <form action="/studentsextracurriculums/{{$class->id}}/{{$semester->id}}/create" method="get" class="ml-3 mt-3">
            <div class="row">
               <div class="col-md-3">
                  <div class="input-group mb-3">
                     <select name="extracurriculums" id="extracurriculums_id" class="form-control" required>
                        <option value="">Pilih Ekstrakurikuler</option>
                        @foreach ($extracurriculums as $cl)
                        <option value="{{ $cl->id}}"
                           {{ ($_GET) ? $_GET['extracurriculums'] == $cl->id ? 'selected' : '' : '' }}>
                           {{ $cl->name  }}
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

         @if(isset($_GET['extracurriculums']))

         <form method="post" action="/studentsextracurriculums" role="form">
            @csrf
            <div class="card-body">

               <table class="table">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nilai</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($students_e as $s)
                     <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $s->nama }}</td>
                        <input type="hidden" name="class_room_id[]" value="{{$class->id}}">
                        <input type="hidden" name="semester_id[]" value="{{$semester->id}}">
                        <input type="hidden" name="class_student_id[]" value="{{$s->id}}">
                        <input type="hidden" name="student_id[]" value="{{$s->student_id}}">

                        <input type="hidden" name="extracurriculums_id" value="{{$_GET['extracurriculums']}}">
                        <td><input type="number" class="form-control" name="nilai[]"></td>
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
