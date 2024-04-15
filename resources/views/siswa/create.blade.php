@extends('layouts/master')

@section('title', 'Tambah Siswa')
@section('header', 'Tambah Data Siswa')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Input Data Siswa</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                {{-- @php
         $default = 1000;
         $tahunMasuk = date('Y');
         $nomor = $default+ 1;
         dd($nomor);
         $nis = $tahunMasuk;
         @endphp --}}

                <form method="post" action="/students" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror"
                                id="nis" placeholder="Masukkan nis" value="{{ $nisTerakhirRegister }}" readonly>
                            @error('nis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                id="nama" placeholder="Masukkan nama" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" placeholder="Masukkan email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir"
                                class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir"
                                placeholder="Masukkan tempat lahir" value="{{ old('tempat_lahir') }}">
                            @error('tempat_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" name="tanggal_lahir"
                                    class="form-control float-right @error('tanggal_lahir') is-invalid @enderror"
                                    id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="janis_kalamin">Jenis Kelamin</label>
                            <select class="form-control custom-select @error('jenis_kelamin') is-invalid @enderror"
                                id="jenis_kelamin" name="jenis_kelamin">
                                <option value="" selected="" disabled="">Pilih jenis kelamin</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select class="form-control custom-select @error('agama') is-invalid @enderror" id="agama"
                                name="agama">
                                <option value="" selected="" disabled="">Pilih agama</option>
                                <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                <option value="Budha" {{ old('agama') == 'Budha' ? 'selected' : '' }}>Budha</option>
                                <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            </select>
                            @error('agama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                placeholder="Masukkan alamat">{{ old('nama') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="anak_ke">Anak Ke</label>
                            <input type="text" name="anak_ke" class="form-control @error('anak_ke') is-invalid @enderror"
                                id="anak_ke" value="{{ old('anak_ke') }}">
                            @error('anak_ke')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nm_lengkap_ayah">Nama Lengkap Ayah</label>
                            <input type="text" name="nm_lengkap_ayah"
                                class="form-control @error('nm_lengkap_ayah') is-invalid @enderror" id="nm_lengkap_ayah"
                                value="{{ old('nm_lengkap_ayah') }}">
                            @error('nm_lengkap_ayah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nm_lengkap_ibu">Nama Lengkap Ibu</label>
                            <input type="text" name="nm_lengkap_ibu"
                                class="form-control @error('nm_lengkap_ibu') is-invalid @enderror" id="nm_lengkap_ibu"
                                value="{{ old('nm_lengkap_ibu') }}">
                            @error('nm_lengkap_ibu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No Telpon</label>
                            <input type="text" name="no_telp"
                                class="form-control @error('no_telp') is-invalid @enderror" id="no_telp"
                                value="{{ old('no_telp') }}">
                            @error('no_telp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                            <input type="text" name="pekerjaan_ayah"
                                class="form-control @error('pekerjaan_ayah') is-invalid @enderror" id="pekerjaan_ayah"
                                value="{{ old('pekerjaan_ayah') }}">
                            @error('pekerjaan_ayah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                            <input type="text" name="pekerjaan_ibu"
                                class="form-control @error('pekerjaan_ibu') is-invalid @enderror" id="pekerjaan_ibu"
                                value="{{ old('pekerjaan_ibu') }}">
                            @error('pekerjaan_ibu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pddk_ayah">Pendidikan Ayah</label>
                            <input type="text" name="pddk_ayah"
                                class="form-control @error('pddk_ayah') is-invalid @enderror" id="pddk_ayah"
                                value="{{ old('pddk_ayah') }}">
                            @error('pddk_ayah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pddk_ibu">Pendidikan Ibu</label>
                            <input type="text" name="pddk_ibu"
                                class="form-control @error('pddk_ibu') is-invalid @enderror" id="pddk_ibu"
                                value="{{ old('pddk_ibu') }}">
                            @error('pddk_ibu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="asal_tk">Nama RA/TK asal</label>
                            <input type="text" name="asal_tk"
                                class="form-control @error('asal_tk') is-invalid @enderror" id="asal_tk"
                                value="{{ old('asal_tk') }}">
                            @error('asal_tk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alamat_tk">Alamat RA/TK</label>
                            <input type="text" name="alamat_tk"
                                class="form-control @error('alamat_tk') is-invalid @enderror" id="alamat_tk"
                                value="{{ old('alamat_tk') }}">
                            @error('alamat_tk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="janis_kalamin">Status</label>
                            <select class="form-control custom-select  @error('status') is-invalid @enderror"
                                id="status" name="status">
                                <option value="" selected="" disabled="">Pilih Status</option>
                                <option value="calon" {{ old('status') == 'calon' ? 'selected' : '' }}>
                                    Calon
                                </option>
                                <option value="siswa" {{ old('status') == 'siswa' ? 'selected' : '' }}>
                                    Siswa
                                </option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        {{-- <div class="form-group">
                  <label for="class_room_id">Kelas</label>
                  <select class="form-control custom-select @error('class_room_id') is-invalid @enderror"
                     id="class_room_id" name="class_room_id">
                     <option value="" selected="" disabled="">Pilih kelas</option>
                     @foreach ($classes as $class)
                     <option value="{{ $class->id }}" {{ old('class_room_id') == $class->id ? 'selected' : '' }}>
               {{$class->nama}}</option>
               @endforeach
               </select>
               @error('class_room_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div> --}}

                        <div class="form-group">
                            <label for="exampleInputFile">Foto</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('foto') is-invalid @enderror"
                                        name="foto" id="customFile">
                                    <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                        <a href="/students" class="btn btn-warning">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script src="{{ asset('assets/js/script-input-edit.js') }}"></script>
@endsection
