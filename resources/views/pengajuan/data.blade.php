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
                                <th>ID. Registrasi</th>
                                <th>Pembuat Ajuan</th>
                                <th>Data Persyaratan</th>
                                <th>Tahapan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>ID. Registrasi</th>
                                <th>Pembuat Ajuan</th>
                                <th>Data Persyaratan</th>
                                <th>Tahapan</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
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
                                        {{-- <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>NO</td>
                                                    <td>Nama Persyaratan</td>
                                                    <td>Berkas/isian data</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($item->berkas_ajuan as $berkas)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $berkas->m_syarat->nama_persyaratan }}</td>
                                                        <td>
                                                            @if ($berkas->m_syarat->format == 'Gambar')
                                                                <div style="max-width:150px; overflow:hidden;">
                                                                    <a href="/data-pengajuan/{{ $berkas->isi_berkas }}/view"
                                                                        target="_blank">
                                                                        <img src=" {{ 'storage/' . $berkas->isi_berkas }}"
                                                                            alt="" class="img-fluid mt-3">
                                                                    </a>
                                                                </div>
                                                                <div class="my-2"></div>
                                                                File Gambar
                                                                <div>
                                                                    <a href="/data-pengajuan/{{ $berkas->isi_berkas }}/view"
                                                                        class="btn btn-primary btn-icon-split"
                                                                        target="_blank">
                                                                        <span class="icon text-white-50">
                                                                            <i class="fa-solid fa-eye"></i>
                                                                        </span>
                                                                        <span class="text">
                                                                            Tampil
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="my-2"></div>
                                                                <div>
                                                                    <a href="/data-pengajuan/{{ $berkas->isi_berkas }}/download"
                                                                        class="btn btn-primary btn-icon-split">
                                                                        <span class="icon text-white-50">
                                                                            <i class="fa-solid fa-download"></i>
                                                                        </span>
                                                                        <span class="text">
                                                                            Download
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            @elseif ($berkas->m_syarat->format == 'PDF')
                                                                <iframe src="{{ 'storage/' . $berkas->isi_berkas }}"
                                                                    frameborder="0"></iframe>
                                                                <div class="my-2"></div>
                                                                File PDF
                                                                <div>
                                                                    <a href="/data-pengajuan/{{ $berkas->isi_berkas }}/view"
                                                                        class="btn btn-primary btn-icon-split"
                                                                        target="_blank">
                                                                        <span class="icon text-white-50">
                                                                            <i class="fa-solid fa-eye"></i>
                                                                        </span>
                                                                        <span class="text">
                                                                            Tampil
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="my-2"></div>
                                                                <div>
                                                                    <a href="/data-pengajuan/{{ $berkas->isi_berkas }}/download"
                                                                        class="btn btn-primary btn-icon-split">
                                                                        <span class="icon text-white-50">
                                                                            <i class="fa-solid fa-download"></i>
                                                                        </span>
                                                                        <span class="text">
                                                                            Download
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            @else
                                                                {{ $berkas->isi_berkas }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table> --}}

                                    </td>
                                    <td>
                                        <a href="/data-pengajuan/{{ $item->tiket }}/detail-ajuan"
                                            class="btn btn-info btn-circle btn-sm">
                                            <i class="fa-solid fa-list-check"></i>
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
