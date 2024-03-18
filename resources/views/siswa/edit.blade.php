@extends('layouts/master')

@section('title', 'Ubah Siswa')
@section('header', 'Ubah Data Siswa')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ubah Data Siswa</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="/students/{{ $student->id }}" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="text" name="nis" class="form-control" id="nis"
                                value="{{ $student->nis }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                id="nama" value="{{ $student->nama }}">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>

                        {{-- <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" id="email" value="">
                </div> --}}

                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir"
                                class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir"
                                value="{{ $student->tempat_lahir }}">
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
                                    class="form-control float-right  @error('tanggal_lahir') is-invalid @enderror"
                                    id="tanggal_lahir" value="{{ $student->tanggal_lahir->format('Y-m-d') }}">
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="janis_kalamin">Jenis Kelamin</label>
                            <select class="form-control custom-select  @error('jenis_kelamin') is-invalid @enderror"
                                id="jenis_kelamin" name="jenis_kelamin">
                                <option value="" selected="" disabled="">Pilih jenis kelamin</option>
                                <option value="Laki-laki" {{ $student->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>
                                <option value="Perempuan" {{ $student->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select class="form-control custom-select  @error('agama') is-invalid @enderror" id="agama"
                                name="agama">
                                <option value="" selected="" disabled="">Pilih agama</option>
                                <option value="Islam" {{ $student->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen" {{ $student->agama == 'Kristen' ? 'selected' : '' }}>Kristen
                                </option>
                                <option value="Katolik" {{ $student->agama == 'Katolik' ? 'selected' : '' }}>Katolik
                                </option>
                                <option value="Budha" {{ $student->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
                                <option value="Hindu" {{ $student->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            </select>
                            @error('agama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control  @error('alamat') is-invalid @enderror" id="alamat"
                                placeholder="Masukkan alamat">{{ $student->alamat }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="anak_ke">Anak Ke</label>
                            <input type="text" name="anak_ke" class="form-control @error('anak_ke') is-invalid @enderror"
                                id="anak_ke" value="{{ $student->anak_ke }}">
                            @error('anak_ke')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nm_lengkap_ayah">Nama Lengkap Ayah</label>
                            <input type="text" name="nm_lengkap_ayah"
                                class="form-control @error('nm_lengkap_ayah') is-invalid @enderror" id="nm_lengkap_ayah"
                                value="{{ $student->nm_lengkap_ayah }}">
                            @error('nm_lengkap_ayah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nm_lengkap_ibu">Nama Lengkap Ibu</label>
                            <input type="text" name="nm_lengkap_ibu"
                                class="form-control @error('nm_lengkap_ibu') is-invalid @enderror" id="nm_lengkap_ibu"
                                value="{{ $student->nm_lengkap_ibu }}">
                            @error('nm_lengkap_ibu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No Telpon</label>
                            <input type="text" name="no_telp"
                                class="form-control @error('no_telp') is-invalid @enderror" id="no_telp"
                                value="{{ $student->no_telp }}">
                            @error('no_telp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                            <input type="text" name="pekerjaan_ayah"
                                class="form-control @error('pekerjaan_ayah') is-invalid @enderror" id="pekerjaan_ayah"
                                value="{{ $student->pekerjaan_ayah }}">
                            @error('pekerjaan_ayah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                            <input type="text" name="pekerjaan_ibu"
                                class="form-control @error('pekerjaan_ibu') is-invalid @enderror" id="pekerjaan_ibu"
                                value="{{ $student->pekerjaan_ibu }}">
                            @error('pekerjaan_ibu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pddk_ayah">Pendidikan Ayah</label>
                            <input type="text" name="pddk_ayah"
                                class="form-control @error('pddk_ayah') is-invalid @enderror" id="pddk_ayah"
                                value="{{ $student->pddk_ayah }}">
                            @error('pddk_ayah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pddk_ibu">Pendidikan Ibu</label>
                            <input type="text" name="pddk_ibu"
                                class="form-control @error('pddk_ibu') is-invalid @enderror" id="pddk_ibu"
                                value="{{ $student->pddk_ibu }}">
                            @error('pddk_ibu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="asal_tk">Nama RA/TK asal</label>
                            <input type="text" name="asal_tk"
                                class="form-control @error('asal_tk') is-invalid @enderror" id="asal_tk"
                                value="{{ $student->asal_tk }}">
                            @error('asal_tk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alamat_tk">Alamat RA/TK asal</label>
                            <input type="text" name="alamat_tk"
                                class="form-control @error('alamat_tk') is-invalid @enderror" id="alamat_tk"
                                value="{{ $student->alamat_tk }}">
                            @error('alamat_tk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="janis_kalamin">Status</label>
                            <select class="form-control custom-select  @error('status') is-invalid @enderror"
                                id="status" name="status">
                                <option value="" selected="" disabled="">Pilih Status</option>
                                <option value="calon" {{ $student->status == 'calon' ? 'selected' : '' }}>
                                    Calon
                                </option>
                                <option value="siswa" {{ $student->status == 'siswa' ? 'selected' : '' }}>
                                    Siswa
                                </option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="exampleInputFile">Foto</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('foto') is-invalid @enderror"
                                        name="foto" id="customFile">
                                    <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                                </div>
                            </div>
                            @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                        <a href="{{ url()->previous() }}" class="btn btn-warning">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script src="{{ asset('assets/js/script-input-edit.js') }}"></script>
@endsection
