@extends('layouts/master')

@section('title', 'Ekstra Kurikuler')
@section('header', 'Data Ekstra Kurikuler')

@section('content')

<div class="row">
   <div class="col-md-12">
      <a href="extracurriculum/create" class="btn btn-primary mb-3 coba">Tambah Ekstra Kurikuler</a>
      <div class="card">
         <div class="card-header">
            <div class="card-title">
               Data Ekstra Kurikuler
            </div>
         </div>
         <div class="card-body">
            <table class="table" id="datatable">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Nama Ekstra Kurikuler</th>
                     <th>Keterangan</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
<script>
   $(document).ready(function(){
      $('#datatable').DataTable({
         processing: true,
         serverside: true,
         ajax: "{{ route('ajax.get.data.extracurriculum') }}",
         columns:[
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            {data: 'name', name: 'name'},
            {data: 'description', name: 'description'},
            {data: 'aksi', name: 'aksi'},
         ]
      });

      $('#datatable').on('click', '.delete', function(e) {
         e.preventDefault();
         const form = $(this).attr('action');

         Swal.fire({
            title: 'Apa kamu yakin?',
            text: "Data Ekstra Kurikuler ini akan hilang!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
         }).then((result) => {
            if (result.value) {
               $('.delete').submit();
            }
         })
      });
   });
</script>
@endsection
