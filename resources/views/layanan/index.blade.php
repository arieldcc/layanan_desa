@extends('layouts.master')
@section('css')
    <!-- Custom styles for this page -->
    <link href="{{ url('/') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('isi')
    <h1 class="h3 mb-4 text-gray-800">Layanan Desa</h1>

    <div class="row">
        <div class="col-lg-12">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Layanan dan Persyaratan</h6>
                </div>
                <div class="card-body">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Layanan</th>
                                <th>Persyaratan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Nama Layanan</th>
                                <th>Persyaratan</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $data)
                                {{-- {{ dd($data->m_syarat()) }} --}}
                                <tr>
                                    <td align="center">{{ $no++ }}</td>
                                    <td>{{ $data->nama_layanan }}</td>
                                    <td>
                                    @foreach ($data->m_syarat as $item)
                                            {{-- {{ dd($item) }} --}}
                                        - {{ $item->nama_persyaratan }} <br>
                                    @endforeach
                                    </td>
                                    <td>
                                        <a href="/syarat-pelayanan/{{ $data->id }}/tambah"
                                            class="btn btn-info btn-circle btn-sm">
                                            {{-- <i class="fas fa-info-circle"></i> --}}
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-circle btn-sm hapus"
                                            layanan-id="{{ $data->id }}">
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
            var layanan_id = $(this).attr('layanan-id')

            swal({
                    title: "Yakin ?",
                    text: "Data akan di hapus?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/syarat-pelayanan/" + layanan_id + "/delete";
                    }
                });
        });
    </script>
@endsection
