@extends('layouts/print')

@section('title', 'Nilai')
@section('header', 'Data Nilai')

@section('content')

    <div class="row">
        <div class="col-lg">

            @if (isset($_GET['kelas']))

                <div class="card">


                    <div class="card-body">
                        <table style= "width:100%;border">
                            <tr>
                                <td colspan="4" style="width: 100%">
                                    <center><b>
                                            <h3> RAPOR DAN PROFIL PESERTA DIDIK
                                </td>
                            </tr>
                            <tr>
                                <td>


                                </td>
                            </tr>
                        </table>
                        <table style= "width:100%">
                            @if ($grades->isNotEmpty())
                                <tr>
                                    <td style="width: 20%;">Nama Peserta didik </td>
                                    <td style="width: 20%;" colspan="">: {{ $grade_info[0]->siswa }}</td>
                                    <td style="width: 10%;" colspan="">Kelas </td>
                                    <td style="width: 40%;" colspan="3">: {{ $grade_info[0]->kl }} </td>
                                </tr>
                                <tr>
                                    <td style="width: 10%;">NIS </td>
                                    <td style="width: 50%;">: {{ $grade_info[0]->nis }}</td>
                                    <td style="width: 10%;">Semester </td>
                                    <td style="width: 50%;" colspan="3">: {{ $grade_info[0]->semester }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 10%;">Nama Sekolah </td>
                                    <td style="width: 50%;">: SDIT At-Tajdied</td>
                                    <td style="width: 10%;">Tahun </td>
                                    <td style="width: 50%;" colspan="3">: {{ $grade_info[0]->tahun_ajaran }} </td>
                                </tr>
                                <tr>
                                    <td style="width: 10%;">Alamat Sekolah </td>
                                    <td style="width: 50%;">: </td>
                                    <td style="width: 10%;">Pelajaran </td>
                                    <td style="width: 50%;" colspan="3">: </td>
                                </tr>
                        </table>
                        <table style="width:100%">

                            <tr>
                                <td colspan="7"> <b>A. Kompetensi Sikap</td>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    <center><b> Deskripsi
                                </td>
                            </tr>

                            <tr style="max-width: 100%">
                                <td style="width:5%">1</td>
                                <td colspan="2"> Sikap Spiritual </td>
                                <td colspan="4"> </td>
                            </tr>
                            <tr style="max-width: 100%">
                                <td style="width:5%">2</td>
                                <td colspan="2"> Sikap Sosial </td>
                                <td colspan="4"> </td>
                            </tr>
                            <tr>
                                <td colspan="7"><b> B. Kompetensi Pengetahuan dan Ketrampilan</td>
                            </tr>
                            <?php
                            $no = 1;
                            ?>
                            @foreach ($grades as $r)
                                <tr style="max-width: 100%">
                                    <td style="width:5%">No</td>
                                    <td> Muatan Pelajaran </td>
                                    <td> Nilai 1 </td>
                                    <td> Nilai 2 </td>
                                    <td> Nilai UTS </td>
                                    <td> Nilai UAS </td>
                                    <td> Nilai Rata-Rata </td>
                                </tr>
                                <tr style="max-width: 100%">
                                    <td style="width:5%">{{ $no++ }}</td>
                                    <td> {{ $r->nama_mapel }} </td>
                                    <td>{{ $r->nilai_tugas_1 }}</td>
                                    <td>{{ $r->nilai_tugas_2 }}</td>
                                    <td>{{ $r->nilai_uts }}</td>
                                    <td>{{ $r->nilai_uas }}</td>
                                    <td>{{ round($r->rata2, 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="7">&nbsp;</td>
                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="10"><b> C. Ekstra Kurikuler</td>
                            </tr>
                            <tr style="max-width: 100%">
                                <td style="width:5%">
                                    <center>No
                                </td>
                                <td colspan="2">
                                    <center> Nama Ekstra Kurikuler
                                </td>
                                <td colspan="3">
                                    <center>Kegiatan
                                </td>
                                <td colspan="1">
                                    <center>Nilai
                                </td>
                            </tr>
                            <?php
                            $no = 1;
                            ?>
                            @foreach ($ekstrakurikuler as $e)
                                <tr style="max-width: 100%">
                                    <td style="width:5%">{{ $no++ }}</td>
                                    <td colspan="2"> {{ $e->nama_eskul }} </td>
                                    <td colspan="3"> {!! html_entity_decode($e->descrip) !!} </td>
                                    <td colspan="3"> {{ $e->nilai }} </td>

                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="7"><b> D. Saran - saran </td>
                            </tr>
                            <tr>
                                <td colspan="7">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="7"><b> E. Tinggi dan Berat Badan </td>
                            </tr>
                            <tr style="max-width: 100%">
                                <td style="width:5%" rowspan="2">No</td>
                                <td colspan="2" rowspan="2"> Aspek yang dinilai </td>
                                <td colspan="4">
                                    <center>Semester
                                </td>
                            </tr>
                            <tr style="max-width: 100%">
                                <td colspan="3">
                                    <center>1
                                </td>
                                <td colspan="2">
                                    <center>2
                                </td>
                            </tr>
                            <tr style="max-width: 100%">
                                <td style="width:5%">1</td>
                                <td colspan="2"> Tinggi Badan </td>
                                <td colspan="3">{{ $grade_info[0]->tinggibadan }} </td>
                                <td colspan="2">{{ $grade_info[0]->tinggibadan }} </td>
                            </tr>
                            <tr style="max-width: 100%">
                                <td style="width:5%">2</td>
                                <td colspan="2"> Berat Badan </td>
                                <td colspan="3">{{ $grade_info[0]->beratbadan }}  </td>
                                <td colspan="2">{{ $grade_info[0]->beratbadan }}  </td>
                            </tr>
                            <tr>
                                <td colspan="7"><b> F. Kondisi Kesehatan</td>
                            </tr>
                            <tr style="max-width: 100%">
                                <td style="width:5%">
                                    <center>No
                                </td>
                                <td colspan="2">
                                    <center><b> Aspek Fisik
                                </td>
                                <td colspan="4">
                                    <center><b>Keterangan
                                </td>
                            </tr>
                            <tr style="max-width: 100%">
                                <td style="width:5%">1</td>
                                <td colspan="2"> <b>Pendengaran </td>
                                <td colspan="4">{{ $grade_info[0]->pendengaran }} </td>
                            </tr>
                            <tr style="max-width: 100%">
                                <td style="width:5%">2</td>
                                <td colspan="2"><b> Penglihatan </td>
                                <td colspan="4">{{ $grade_info[0]->penglihatan }} </td>
                            </tr>
                            <tr style="max-width: 100%">
                                <td style="width:5%">3</td>
                                <td colspan="2"><b> Gigi </td>
                                <td colspan="4">{{ $grade_info[0]->gigi }} </td>
                            </tr>
                            <tr>
                                <td colspan="7"><b>G. Prestasi</td>
                            </tr>
                            <tr style="max-width: 100%">
                                <td style="width:5%">
                                    <center>No
                                </td>
                                <td colspan="2">
                                    <center> <b>Jenis Prestasi
                                </td>
                                <td colspan="4">
                                    <center><b>Keterangan
                                </td>
                            </tr>
                            <tr style="max-width: 100%">
                                <td style="width:5%">1</td>
                                <td colspan="2">{{ $grade_info[0]->prestasi }} </td>
                                <td colspan="4"> </td>
                            </tr>

                            <tr>
                                <td colspan="4"><b>H. Ketidakhadiran</td>
                                <td colspan="3">Keputusan</td>
                            </tr>
                            <tr style="max-width: 100%">
                                <td style="width:5%">
                                    <center>1
                                </td>
                                <td colspan="2"> Sakit </td>
                                <td>
                                    {{ $grade_info[0]->sakit }}<center>
                                </td>
                                <td colspan="3">Berdasarkan pencapaian </td>
                            </tr>
                            <tr style="max-width: 100%">
                                <td style="width:5%">
                                    <center>2
                                </td>
                                <td colspan="2">Ijin </td>
                                <td>
                                    {{ $grade_info[0]->izin }}<center>
                                </td>
                                <td colspan="3">seluruh kompetensi </td>
                            </tr>
                            <tr style="max-width: 100%">
                                <td style="width:5%">
                                    <center>3
                                </td>
                                <td colspan="2">Tanpa Keterangan </td>
                                <td> {{ $grade_info[0]->alpha }}</td>
                                <td colspan="3">peserta didik dinyatakan :</td>
                            </tr>
                            <tr>
                                <td colspan="4">&nbsp;</td>
                                <td colspan="4">Naik/Tinggal*) kelas : ( )<br><br>*) Coret yang tidak perlu</td>
                            </tr>
                        </table>
                        <table style="width: 100%">
                            <tr>
                                <td colspan="7">

                            </tr>
                            <tr style="max-width: 100%">
                                <td style="width:10%">
                                    <center>Orang Tua / Wali
                                </td>
                                <td style="width: 10%"></td>
                                <td style="" colspan="2">
                                    <center>Pasirjambu,
                                </td>
                            </tr>
                            <tr>
                                <td style="width:40%"> </td>
                                <td></td>
                                <td style="width: 100%;">
                                    <center>Guru Kelas
                                </td>
                            </tr>
                            <tr>
                                <td> &nbsp;</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td> &nbsp;</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td> &nbsp;</td>
                                <td></td>
                            </tr>

                            <tr>
                                <td>
                                    <center>.....................................
                                </td>
                                <td></td>
                                <td>
                                    <center><b>HANIFAH TEJA P.,S.Kom.I.
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <center> NIP.
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"> &nbsp;</td>
                            </tr>

                            <tr>
                                <td colspan="4">
                                    <center>Mengetahui
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <center>Kepala Sekolah
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <center>&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <center>&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <center>&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <center><b>M. IQBAL FATHURAHMAN, M.Pd.
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <center><b>NIP.
                                </td>
                            </tr>

                        </table>
                    @else
                        <div class="alert alert-danger">
                            Data nilai tidak ada
                        </div>
            @endif
        @else
            <div class="alert alert-info">
                Untuk menampilkan nilai pilih kelas dan semester
            </div>
            @endif
        </div>
    </div>
    </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            window.print();
        });
    </script>
    <style>
        table {

            border-collapse: collapse;

        }

        table,
        td,
        th {
            border: 1px solid;
            padding: 8px
        }
    </style>
@endsection

{{-- <form action="" method="post" id="search-form">
            <div class="row">
                <div class="col-auto">
                    <div class="form-group">
                        <select name="kelas" id="kelas" class="form-control custom-select">
                            <option value="">Pilih kelas</option>
                            @foreach ($classes as $class)
                            <option value="{{$class->id}}"
{{ old('kelas') == $class->id ? 'selected' : '' }}>{{ $class->nama }}</option>
@endforeach
</select>
</div>
</div>
<div class="col-auto">
   <div class="form-group">
      <select name="semester" id="semester" class="form-control custom-select">
         <option value="">Pilih semester</option>
         @foreach ($semesters as $semester)
         <option value="{{$semester->id}}">{{ $semester->tahun_ajaran .' | '. $semester->semester }}
         </option>
         @endforeach
      </select>
   </div>
</div>
<div class="col-auto">
   <button type="submit" class="btn btn-success">Tampilkan</button>
</div>
</div>

</form> --}}
