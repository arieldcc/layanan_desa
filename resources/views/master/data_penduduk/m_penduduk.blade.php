@extends('layouts.master')
@section('css')
    <!-- Custom styles for this page -->
    <link href="{{ url('/') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('isi')
    <h1 class="h3 mb-4 text-gray-800">Data Penduduk</h1>

    <div class="row">
        <div class="col-lg-12">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Penduduk</h6>
                </div>
                <div class="card-body">
                    {{-- <div class="my-2"></div> --}}
                    <a href="tambah-penduduk" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-circle"></i>
                        </span>
                        <span class="text">Tambah Data</span>
                    </a>
                    <div class="my-4"></div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Jenis Kelamin</th>
                                <th>No.Telp</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Jenis Kelamin</th>
                                <th>No.Telp</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $data)
                                <tr>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->nik }}</td>
                                    <td>{{ $data->jenis_kel }}</td>
                                    <td>{{ $data->handphone }}</td>
                                    <td>{{ $data->jalan }}</td>
                                    <td><a href="#" class="btn btn-success btn-circle btn-sm">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <a href="data_penduduk/{{ $data->id }}/edit"
                                            class="btn btn-info btn-circle btn-sm">
                                            {{-- <i class="fas fa-info-circle"></i> --}}
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-circle btn-sm hapus"
                                            penduduk-id="{{ $data->id }}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('js')
    <!-- Page level plugins -->
    <script src="{{ url('/') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ url('/') }}/js/demo/datatables-demo.js"></script>
   <script src="{{ url('/') }}/js/sweetalert.min.js"></script>

    <script>
        $('.hapus').click(function() {
            var penduduk_id = $(this).attr('penduduk-id')

            swal({
                    title: "Yakin ?",
                    text: "Data akan di hapus?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/data_penduduk/" + penduduk_id + "/delete";
                    }
                });
        });
    </script>
@endsection
