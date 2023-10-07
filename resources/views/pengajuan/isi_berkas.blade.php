@extends('layouts.master')
@section('isi')
    <h1 class="h3 mb-4 text-gray-800">Pengajuan Pelayanan Baru</h1>
    <div class="row">
        <div class="col-lg-12">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Data Pengajuan Layanan</h6>
                </div>
                <div class="card-body">

                    <form method="POST" action="/pengajuan-pelayanan/kirim-ajuan" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $data_penduduk->id }}" name="m_penduduk_id">
                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="nik">Nomor Induk Kependudukan</label>
                                <input type="text" class="form-control" id="nik" placeholder="Nama Layanan"
                                    value="{{ $data_penduduk->nik }}" name="nik" disabled>
                                @if ($errors->has('nik'))
                                    <span class="help-block">{{ $errors->first('nik') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" placeholder="Nama Layanan"
                                    value="{{ $data_penduduk->nama }}" name="nama" disabled>
                                @if ($errors->has('nama'))
                                    <span class="help-block">{{ $errors->first('nama') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir"
                                    placeholder="tempat_lahir Layanan" value="{{ $data_penduduk->tempat_lahir }}"
                                    name="tempat_lahir" disabled>
                                @if ($errors->has('tempat_lahir'))
                                    <span class="help-block">{{ $errors->first('tempat_lahir') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="text" class="form-control" id="tgl_lahir" placeholder="tgl_lahir Layanan"
                                    value="{{ $data_penduduk->tgl_lahir }}" name="tgl_lahir" disabled>
                                @if ($errors->has('tgl_lahir'))
                                    <span class="help-block">{{ $errors->first('tgl_lahir') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="jenis_kel">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="jenis_kel" name="jenis_kel" disabled
                                    value="{{ $data_penduduk->jenis_kel }}">
                                @if ($errors->has('jenis_kel'))
                                    <span class="help-block">{{ $errors->first('jenis_kel') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="agama">Agama</label>
                                <input type="text" class="form-control" id="agama" name="agama" disabled
                                    value="{{ $data_penduduk->agama }}">
                                @if ($errors->has('agama'))
                                    <span class="help-block">{{ $errors->first('agama') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="status_nikah">Status Nikah</label>
                                <input type="text" class="form-control" id="status_nikah" name="status_nikah" disabled
                                    value="{{ $data_penduduk->status_nikah }}">
                                @if ($errors->has('status_nikah'))
                                    <span class="help-block">{{ $errors->first('status_nikah') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="telepon">No. Telepon/Handphone</label>
                                <input type="text" class="form-control" id="telepon" name="telepon" disabled
                                    value="{{ $data_penduduk->telepon . ' / ' . $data_penduduk->handphone }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="jalan">Jalan</label>
                                <input type="text" class="form-control" id="jalan" name="jalan" disabled
                                    value="{{ $data_penduduk->jalan }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="kelurahan">Kelurahan</label>
                                <input type="text" class="form-control" id="kelurahan" name="kelurahan" disabled
                                    value="{{ $data_penduduk->kelurahan }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="dusun">Dusun</label>
                                <input type="text" class="form-control" id="dusun" name="dusun" disabled
                                    value="{{ $data_penduduk->dusun }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="rtrw">RT/RW</label>
                                <input type="text" class="form-control" id="rtrw" name="rtrw" disabled
                                    value="{{ $data_penduduk->rt . ' / ' . $data_penduduk->rw }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="kode_pos">Kode POS</label>
                                <input type="text" class="form-control" id="kode_pos" name="kode_pos" disabled
                                    value="{{ $data_penduduk->kode_pos }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="email">EMail</label>
                                <input type="text" class="form-control" id="email" name="email" disabled
                                    value="{{ $data_penduduk->email }}">
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="status_layanan">
                                    <h3>Persyaratan : {{ $data_layanan->nama_layanan }}</h3>
                                </label>
                            </div>
                        </div>

                        <input type="hidden" value="{{ $data_layanan->id }}" name="m_layanan_id">

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama Berkas</th>
                                            <th scope="col">Format/Size (KB)</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Contoh Berkas</th>
                                            <th scope="col">Upload/Isi Berkas</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data_layanan->m_syarat as $item)
                                        {{-- - {{ $item->nama_persyaratan }} <br> --}}
                                        <input type="hidden" value="{{ $item->id }}" name="id[]">
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->nama_persyaratan }}</td>
                                            <td>{{ $item->format . '/' . $item->ukuran }}</td>
                                            <td>{{ $item->status_persyaratan }}</td>
                                            <td>
                                                @if ($item->contoh_berkas)
                                                    <a href="">{{ $item->contoh_berkas }}</a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->jenis_berkas == 'File')
                                                    <input class="form-control @error('berkas{{ $item->id }}') is-invalid @enderror"
                                                        type="file" id="berkas" name="berkas{{ $item->id }}">
                                                @else
                                                <input type="text" class="form-control @error('berkas') is-invalid @enderror"
                                    id="berkas{{ $item->id }}" placeholder="{{ $item->keterangan }}" name="berkas{{ $item->id }}">
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                        <div class="my-4"></div>
                        <a href="/pengajuan-pelayanan" class="btn btn-warning btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fa-solid fa-angles-left fa-beat-fade"></i>
                            </span>
                            <span class="text">Kembali</span>
                        </a>
                        <button type="submit" class="btn btn-primary float-right btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fa-solid fa-angles-right fa-beat-fade"></i>
                            </span>
                            <span class="text">Kirim Pengajuan</span>
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
