@extends('layouts/master')

@section('title', 'Ubah Ekstra Kurikuler')
@section('header', 'Ubah Data Ekstra Kurikuler')

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Ubah Data Ekstra Kurikuler</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="/extracurriculum/{{$extracurriculum->id}}" role="form" enctype="multipart/form-data">
                @csrf
                @method('put')
              <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama Ekstra Kurikuler</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                        placeholder="Masukkan nama"  value="{{ $extracurriculum->name }}">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                <div class="form-group">
                    <label for="nama">Keterangan Ekstra Kurikuler</label>
                    <textarea class="form-control" id="description" placeholder="Enter the Description" rows="5" name="description">{!! html_entity_decode($extracurriculum->description) !!}</textarea>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Ubah Data</button>
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
