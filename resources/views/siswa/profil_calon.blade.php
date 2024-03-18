@extends('layouts/master')

@section('title', 'Profil')
@section('header', 'Profil')

@section('content')

    <div class="row">
        <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ $student->getFoto() }}"
                            alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">{{ $student->nama }}</h3>

                    <p class="text-muted text-center">{{ $student->nis }} </p>

                    {{-- <ul class="list-group list-group-unbordered mb-3"> --}}
                    {{-- <li class="list-group-item">
                  <b>Mata Pelajaran</b> <a class="float-right">{{ !empty($grades) ? $grades->count():'0' }}</a>
            </li> --}}
                    <hr>

                    <b><i class="fas fa-calendar-day mr-1"></i> Tempat Tanggal Lahir</b>

                    <p class="text-muted">
                        {{ $student->tempat_lahir . ', ' . $student->tanggal_lahir->format('d M Y') }}
                    </p>

                    <hr>
                    <strong><i class="fas fa-venus-mars mr-1"></i> Jenis Kelamin</strong>

                    <p class="text-muted">
                        {{ $student->jenis_kelamin }}
                    </p>

                    <hr>
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                    <p class="text-muted">{{ $student->alamat }}</p>
                    <hr>

                    <strong><i class="fas fa-praying-hands mr-1"></i> Agama</strong>

                    <p class="text-muted">
                        {{ $student->agama }}
                    </p>
                    <hr>

                    <strong><i class="far fa-envelope mr-1"></i> Email</strong>

                    <p class="text-muted">{{ $student->user->email }}</p>

                    <hr>
                    <hr>

                    <strong><i class="far fa-file mr-1"></i> Anak Ke</strong>

                    <p class="text-muted">{{ $student->anak_ke }}</p>

                    <hr>
                    <hr>

                    <strong><i class="far fa-file mr-1"></i> Nama Lengkap Ayah</strong>

                    <p class="text-muted">{{ $student->nm_lengkap_ayah }}</p>

                    <hr>
                    <hr>

                    <strong><i class="far fa-file mr-1"></i> Nama Lengkap Ibu</strong>

                    <p class="text-muted">{{ $student->nm_lengkap_ibu }}</p>

                    <hr>
                    <hr>

                    <strong><i class="far fa-file mr-1"></i> No Telpon</strong>

                    <p class="text-muted">{{ $student->no_telp }}</p>

                    <hr>
                    <hr>

                    <strong><i class="far fa-file mr-1"></i> Pekerjaan Ayah</strong>

                    <p class="text-muted">{{ $student->pekerjaan_ayah }}</p>

                    <hr>
                    <hr>

                    <strong><i class="far fa-file mr-1"></i> Pekerjaan Ibu</strong>

                    <p class="text-muted">{{ $student->pekerjaan_ibu }}</p>

                    <hr>
                    <hr>

                    <strong><i class="far fa-file mr-1"></i> Pendidikan Ayah</strong>

                    <p class="text-muted">{{ $student->pddk_ayah }}</p>

                    <hr>
                    <hr>

                    <strong><i class="far fa-file mr-1"></i> Pendidikan Ibu</strong>

                    <p class="text-muted">{{ $student->pddk_ibu }}</p>

                    <hr>
                    <hr>

                    <strong><i class="far fa-file mr-1"></i>Nama RA/TK asal</strong>

                    <p class="text-muted">{{ $student->asal_tk }}</p>

                    <hr>
                    <hr>

                    <strong><i class="far fa-file mr-1"></i>Alamat RA/TK asal</strong>

                    <p class="text-muted">{{ $student->alamat_tk }}</p>

                    <hr>

                    <a href="/students/{{ $student->id }}/edit" class="btn btn-success btn-sm">Edit</a>


                    {{-- </ul> --}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>



    </div>
    <!-- /.card-body -->
    </div>
    <!-- /.nav-tabs-custom -->

    </div>
    <!-- /.col -->
    </div>

@endsection
