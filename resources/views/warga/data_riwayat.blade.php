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
                <h6 class="m-0 font-weight-bold text-primary">Data Riwayat Pengajuan Layanan Desa</h6>
            </div>
            <div class="card-body">

                <table class="table table-responsive table-bordered table-sm" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID. Registrasi</th>
                            <th>Pembuat Ajuan</th>
                            <th>Data Persyaratan</th>
                            <th>Tahapan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $item)
                            {{-- {{ dd($item) }} --}}
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    {{ $item->tiket }}
                                </td>
                                <td>
                                    Nama Pembuat Ajuan: <br>
                                    {{ $item->m_penduduk->nama }} <br><br>
                                    NIK : <br>
                                    {{ $item->m_penduduk->nik }} <br><br>
                                </td>
                                <td>
                                    Ajuan Layanan : <br>
                                    {{ $item->m_layanan->nama_layanan }} <br><br>
                                    Waktu Ajuan : <br>
                                    {{ $item->registrasi }}
                                </td>
                                <td>
                                    {{ $item->status_berkas }}
                                </td>
                                <td>
                                    <a href="/riwayat-pengajuan/{{ $item->tiket }}/detail"
                                        class="btn btn-info btn-circle btn-sm">
                                        <i class="fa-solid fa-eye"></i>
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

@endsection
