@extends('layouts/master')

@section('title', 'Tambah Mata Pelajaran')
@section('header', 'Tambah Data Mata Pelajaran')

@section('content')

<div class="row">
  <div class="col-md-6">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Input Data Ekstra Kurikuler</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form method="post" action="/extracurriculum" role="form" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="nama">Nama Ekstra Kurikuler</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                  placeholder="Masukkan nama" value="{{ old('name') }}">
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>

          <div class="form-group">
            <label for="nama">Keterangan Ekstra Kurikuler</label>
            <textarea class="form-control" id="description" placeholder="Enter the Description" rows="5" name="description"></textarea>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Tambah Data</button>
          <a href="/extracurriculum" class="btn btn-warning">Batal</a>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('script')
<script src="{{ asset('assets/js/script-input-edit.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
            .create( document.querySelector( '#description' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
@endsection
