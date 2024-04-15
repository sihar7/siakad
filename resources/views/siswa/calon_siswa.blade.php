@extends('layouts/master')

@section('title', 'Siswa')
@section('header', 'Data Siswa')

@section('content')

<div class="row">
    <div class="col-md-12">
        <a href="/calon_siswa/create_calon" class="btn btn-primary mb-3 coba load">Tambah Calon Siswa</a>
        <a href="/export-calon_siswa-pdf" class="btn btn-primary mb-3">Export PDF</a>

        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Data Siswa
                </div>

                <div class="float-right" id="formStatus">
                    <div class="form-group">
                        <label for="janis_kalamin">Status</label>
                        <select class="form-control custom-select  @error('status') is-invalid @enderror" id="status"
                            name="status">
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

                    <button class="btn btn-primary update_all">Perbarui Semua</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th width="50px"><input type="checkbox" id="master"></th>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
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
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#datatable').DataTable({
            processing: true,
            serverside: true,
            ajax: "{{ route('ajax.get.data.student_calon') }}",
            columns: [{
                    data: 'checkbox',
                    name: 'checkbox'
                },
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nis',
                    name: 'nis'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'jenis_kelamin',
                    name: 'jenis_kelamin'
                },
                {
                    data: 'alamat',
                    name: 'alamat'
                },
                // {data: 'kelas', name: 'kelas'},
                {
                    data: 'aksi',
                    name: 'aksi'
                },
            ]
        });

        $('#datatable').on('click', '.delete', function (e) {

            e.preventDefault();
            const form = $(this).attr('action');

            Swal.fire({
                title: 'Apa kamu yakin?',
                text: "Data siswa dan user ini akan hilang!",
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

        $('.update_all').hide();

        $('#master').on('click', function (e) {
            if ($(this).is(':checked', true)) {
                $(".sub_chk").prop('checked', true);
            } else {
                $(".sub_chk").prop('checked', false);
            }
        });

        $('#status').on('change', function () {
            status();
        });

        $('.update_all').on('click', function () {
            status();
        });

        function status ()
        {
            var allVals = [];
            $(".sub_chk:checked").each(function () {
                allVals.push($(this).attr('data-id'));
            });


            if (allVals.length <= 0) {
                alert("Silakan pilih baris.");
                $('.update_all').show();
            } else {

                var check = confirm("Apakah kamu yakin ingin memperbaharui status?");
                if (check == true) {

                    var join_selected_values = allVals.join(",");
                    let status = $("#status").val();

                    $.ajax({
                        type: 'POST',
                        url: `{{ url('updateAll') }}/${join_selected_values}`,
                        data: {
                            'status': status
                        },
                        success: function (data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function () {
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Ups ada yang bermasalah!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });


                    $.each(allVals, function (index, value) {
                        $('table tr').filter("[data-row-id='" + value + "']").remove();
                    });
                }
            }
        }
    });

</script>
@endsection
