@extends('layouts.master')
@section('css')
    <link href="{{ url('/') }}/css/tracking.css" rel="stylesheet">
@endsection
@section('isi')
    <h1 class="h3 mb-4 text-gray-800">Detail Pengajuan : {{ $data->m_layanan->nama_layanan }}</h1>
    <div class="row">
        <div class="col-lg-6">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Data Pengajuan Layanan</h6>
                </div>
                <div class="card-body">

                    <form method="POST" action="/pengajuan-pelayanan/kirim-ajuan" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $data->m_penduduk->id }}" name="m_penduduk_id">
                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="tiket">ID. Registrasi</label>
                                <input type="text" class="form-control" id="tiket" placeholder="Nama Layanan"
                                    value="{{ $data->tiket }}" name="tiket" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nik">Nomor Induk Kependudukan</label>
                                <input type="text" class="form-control" id="nik" placeholder="Nama Layanan"
                                    value="{{ $data->m_penduduk->nik }}" name="nik" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" placeholder="Nama Layanan"
                                    value="{{ $data->m_penduduk->nama }}" name="nama" disabled>
                                @if ($errors->has('nama'))
                                    <span class="help-block">{{ $errors->first('nama') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir"
                                    placeholder="tempat_lahir Layanan" value="{{ $data->m_penduduk->tempat_lahir }}"
                                    name="tempat_lahir" disabled>
                                @if ($errors->has('tempat_lahir'))
                                    <span class="help-block">{{ $errors->first('tempat_lahir') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="text" class="form-control" id="tgl_lahir" placeholder="tgl_lahir Layanan"
                                    value="{{ $data->m_penduduk->tgl_lahir }}" name="tgl_lahir" disabled>
                                @if ($errors->has('tgl_lahir'))
                                    <span class="help-block">{{ $errors->first('tgl_lahir') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="jenis_kel">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="jenis_kel" name="jenis_kel" disabled
                                    value="{{ $data->m_penduduk->jenis_kel }}">
                                @if ($errors->has('jenis_kel'))
                                    <span class="help-block">{{ $errors->first('jenis_kel') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="agama">Agama</label>
                                <input type="text" class="form-control" id="agama" name="agama" disabled
                                    value="{{ $data->m_penduduk->agama }}">
                                @if ($errors->has('agama'))
                                    <span class="help-block">{{ $errors->first('agama') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="status_nikah">Status Nikah</label>
                                <input type="text" class="form-control" id="status_nikah" name="status_nikah" disabled
                                    value="{{ $data->m_penduduk->status_nikah }}">
                                @if ($errors->has('status_nikah'))
                                    <span class="help-block">{{ $errors->first('status_nikah') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="telepon">No. Telepon/Handphone</label>
                                <input type="text" class="form-control" id="telepon" name="telepon" disabled
                                    value="{{ $data->m_penduduk->telepon . ' / ' . $data->m_penduduk->handphone }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="jalan">Jalan</label>
                                <input type="text" class="form-control" id="jalan" name="jalan" disabled
                                    value="{{ $data->m_penduduk->jalan }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="kelurahan">Kelurahan</label>
                                <input type="text" class="form-control" id="kelurahan" name="kelurahan" disabled
                                    value="{{ $data->m_penduduk->kelurahan }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="dusun">Dusun</label>
                                <input type="text" class="form-control" id="dusun" name="dusun" disabled
                                    value="{{ $data->m_penduduk->dusun }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="rtrw">RT/RW</label>
                                <input type="text" class="form-control" id="rtrw" name="rtrw" disabled
                                    value="{{ $data->m_penduduk->rt . ' / ' . $data->m_penduduk->rw }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="kode_pos">Kode POS</label>
                                <input type="text" class="form-control" id="kode_pos" name="kode_pos" disabled
                                    value="{{ $data->m_penduduk->kode_pos }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="email">EMail</label>
                                <input type="text" class="form-control" id="email" name="email" disabled
                                    value="{{ $data->m_penduduk->email }}">
                            </div>
                        </div>
                        <hr>

                    </form>

                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        @if ($data->status_berkas != 'Penetapan' && $data->status_berkas != 'Diambil')
                            Estimasi Pengerjaan Pengajuan
                            @php
                                $tgl = substr($data->registrasi, 0, 10);
                                $tgl2 = date('d-m-Y', strtotime('+7 days', strtotime($tgl)));
                                // echo $tgl2;
                            @endphp
                        @else
                            Waktu Penyelesaian
                            @php
                                $tgl = new DateTime(substr($data->registrasi, 0, 16));
                                $tgl1 = new DateTime(substr($data->penetapan, 0, 16));
                                $tgl2 = $tgl1->diff($tgl);
                            @endphp
                        @endif
                    </h6>
                </div>
                <div class="card-body">


                    <div class="d-flex justify-content-center">
                        @if ($data->status_berkas != 'Penetapan' && $data->status_berkas != 'Diambil')
                            <h3>{{ $tgl2 }}</h3>
                        @else
                            <h3>{{ $tgl2->d.' Hari '.$tgl2->h.' Jam '.$tgl2->i.' Menit '.$tgl2->s.' Detik' }}</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Status Berkas</h6>
                </div>
                <div class="card-body">
                    @if ($data->status_berkas == 'Pengajuan')
                        <a class="btn btn-warning d-flex justify-content-center">
                            <h4>{{ $data->status_berkas }}</h4>
                        </a>
                    @else
                        <a class="btn btn-info d-flex justify-content-center">
                            <h4>{{ $data->status_berkas }}</h4>
                        </a>
                    @endif
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kelengkapan Berkas</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Berkas</th>
                                <th scope="col">Berkas/Isian Data</th>
                            </tr>
                        </thead>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data->berkas_ajuan as $berkas)
                            {{-- - {{ $item->nama_persyaratan }} <br> --}}
                            <input type="hidden" value="{{ $berkas->id }}" name="id[]">
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $berkas->m_syarat->nama_persyaratan }}</td>
                                <td>
                                    @if ($data->status_berkas == 'Pengajuan')
                                        @if ($berkas->m_syarat->format == 'Gambar')
                                        <div>
                                            <a href="/data-pengajuan/{{ $berkas->isi_berkas }}/view"
                                                class="btn btn-primary btn-icon-split" target="_blank">
                                                <span class="icon text-white-50">
                                                    <i class="fa-solid fa-eye"></i>
                                                </span>
                                                <span class="text">
                                                    Tampilkan Berkas
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
                                                        Download file Berkas
                                                    </span>
                                                </a>
                                            </div>
                                        @elseif ($berkas->m_syarat->format == 'PDF')
                                            <div>
                                                <a href="/data-pengajuan/{{ $berkas->isi_berkas }}/view"
                                                    class="btn btn-primary btn-icon-split" target="_blank">
                                                    <span class="icon text-white-50">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </span>
                                                    <span class="text">
                                                        Tampilkan Berkas
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="my-1"></div>
                                            <div>
                                                <a href="/data-pengajuan/{{ $berkas->isi_berkas }}/download"
                                                    class="btn btn-primary btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fa-solid fa-download"></i>
                                                    </span>
                                                    <span class="text">
                                                        Download file Berkas
                                                    </span>
                                                </a>
                                            </div>
                                        @else
                                            {{ $berkas->isi_berkas }}
                                        @endif
                                    @else
                                        <a href="#" class="btn btn-success btn-circle btn-sm">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Posisi Berkas Anda saat ini</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table table-tracking">
                        <thead>
                            <tr>
                                <th style="text-align: center;vertical-align: middle; font-size: 10px;">Tahap 1
                                    <br>Registrasi
                                </th>
                                <th style="text-align: center;vertical-align: middle; font-size: 10px;">Tahap 2
                                    <br>Backoffice
                                </th>
                                <th style="text-align: center;vertical-align: middle; font-size: 10px;">Tahap 3
                                    <br>Penetapan
                                </th>
                                <th style="text-align: center;vertical-align: middle; font-size: 10px;">Tahap 4
                                    <br>Pengambilan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="track-status {{ $data->registrasi != null ? 'pengajuan' : 'putih' }}">
                                    {{ $data->registrasi }}</td>
                                <td class="track-status {{ $data->backoffice != null ? 'proses' : 'putih' }}">
                                    {{ $data->backoffice }}</td>
                                <td class="track-status {{ $data->penetapan != null ? 'penetapan' : 'putih' }}">
                                    {{ $data->penetapan }}</td>
                                <td class="track-status {{ $data->pengambilan != null ? 'selesai' : 'putih' }}">
                                    {{ $data->pengambilan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @if ($data->status_berkas == 'Pengajuan')
            <div class="col-lg-12">
                <!-- Basic Card Example -->
                <div class="card shadow">
                    <div class="card-body">
                        <form action="/data-pengajuan/tahap2" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $data->tiket }}" name="tiket">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="keterangan">Catatan :</label>
                                    <textarea name="keterangan" id="keterangan" rows="5"
                                        class="form-control @error('keterangan') is-invalid @enderror"></textarea>
                                    @if ($errors->has('keterangan'))
                                        <span class="help-block">{{ $errors->first('keterangan') }}</span>
                                    @endif
                                </div>
                            </div>
                            <a href="/data-pengajuan" class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fa-solid fa-angles-left fa-beat-fade"></i>
                                </span>
                                <span class="text">Kembali</span>
                            </a>
                            <button type="submit" class="btn btn-primary float-right btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fa-solid fa-angles-right fa-beat-fade"></i>
                                </span>
                                <span class="text">Proses Tahap 2</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @elseif ($data->status_berkas == 'Backoffice')
            <div class="col-lg-12">
                <!-- Basic Card Example -->
                <div class="card shadow">
                    <div class="card-body">
                        <form action="/data-pengajuan/penetapan" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $data->tiket }}" name="tiket">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="file" class="form-label">Hasil Penetapan (File PDF, max: 1024
                                        KB)</label>
                                    <input class="form-control @error('hasil_file') is-invalid @enderror" type="file"
                                        id="hasil_file" name="hasil_file">
                                    @if ($errors->has('hasil_file'))
                                        <span class="help-block">{{ $errors->first('hasil_file') }}</span>
                                    @endif
                                </div>
                            </div>
                            <a href="/data-pengajuan" class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fa-solid fa-angles-left fa-beat-fade"></i>
                                </span>
                                <span class="text">Kembali</span>
                            </a>
                            <button type="submit" class="btn btn-primary float-right btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fa-solid fa-angles-right fa-beat-fade"></i>
                                </span>
                                <span class="text">Penetapan/Kirim File</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @else
        <div class="col-lg-12">
            <!-- Basic Card Example -->
            <div class="card shadow">
                <div class="card-body">

                        <a href="/data-pengajuan" class="btn btn-warning btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fa-solid fa-angles-left fa-beat-fade"></i>
                            </span>
                            <span class="text">Kembali</span>
                        </a>

                        <a href="/data-pengajuan/{{ $data->hasil_file }}/download"
                            class="btn btn-primary btn-icon-split float-right">
                            <span class="icon text-white-50">
                                <i class="fa-solid fa-download"></i>
                            </span>
                            <span class="text">
                                Download Berkas
                            </span>
                        </a>

                </div>
            </div>
        </div>
        @endif


    </div>
@endsection
