@extends('layouts.master')
@section('css')
    <link href="{{ url('/') }}/css/jquery-ui.css" rel="stylesheet">
@endsection
@section('isi')
    <h1 class="h3 mb-4 text-gray-800">Profil Data</h1>
    <div class="row">
        <div class="col-lg-12">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Profil</h6>
                </div>
                <div class="card-body">

                    <form method="POST" action="/data_penduduk/{{ $penduduk->id }}/update">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 {{ $errors->has('nama') ? ' has-error' : '' }}">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap"
                                    name="nama" value="{{ $penduduk->nama }}" disabled>
                                @if ($errors->has('nama'))
                                    <span class="help-block">{{ $errors->first('nama') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control" id="nik"
                                    placeholder="Nomor Induk Kependudukan" name="nik" value="{{ $penduduk->nik }}"
                                    disabled>
                                @if ($errors->has('nik'))
                                    <span class="help-block">{{ $errors->first('nik') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir"
                                    name="tempat_lahir" value="{{ $penduduk->tempat_lahir }}" disabled>
                                @if ($errors->has('tempat_lahir'))
                                    <span class="help-block">{{ $errors->first('tempat_lahir') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="datepicker">Tanggal Lahir</label>
                                <input type="text" class="form-control" placeholder="Tanggal Lahir" name="tgl_lahir"
                                    value="{{ $penduduk->tgl_lahir }}" disabled>
                                @if ($errors->has('tgl_lahir'))
                                    <span class="help-block">{{ $errors->first('tgl_lahir') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="kewarganegaraan">Kewarganegaraan</label>
                                <select class="form-control" id="kewarganegaraan" name="kewarganegaraan" disabled>
                                    <option value="">-- Pilih Kewarganegaraan --</option>
                                    <option value="WNI" {{ $penduduk->kewarganegaraan == 'WNI' ? 'selected' : '' }}>WNI
                                    </option>
                                    <option value="WNA" {{ $penduduk->kewarganegaraan == 'WNA' ? 'selected' : '' }}>WNA
                                    </option>
                                </select>
                                @if ($errors->has('kewarganegaraan'))
                                    <span class="help-block">{{ $errors->first('kewarganegaraan') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label for="jenis_kel">Jenis Kelamin</label>
                                <select class="form-control" id="jenis_kel" name="jenis_kel" disabled>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki" {{ $penduduk->jenis_kel == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki
                                    </option>
                                    <option value="Perempuan" {{ $penduduk->jenis_kel == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>
                                </select>
                                @if ($errors->has('jenis_kel'))
                                    <span class="help-block">{{ $errors->first('jenis_kel') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label for="agama">Agama</label>
                                <select class="form-control" id="agama" name="agama" disabled>
                                    <option value="">-- Pilih Agama --</option>
                                    <option value="Islam" {{ $penduduk->agama == 'Islam' ? 'selected' : '' }}>Islam
                                    </option>
                                    <option value="Kristen" {{ $penduduk->agama == 'Kristen' ? 'selected' : '' }}>Kristen
                                    </option>
                                    <option value="Katolik" {{ $penduduk->agama == 'Katolik' ? 'selected' : '' }}>Katolik
                                    </option>
                                    <option value="Hindu" {{ $penduduk->agama == 'Hindu' ? 'selected' : '' }}>Hindu
                                    </option>
                                    <option value="Budha" {{ $penduduk->agama == 'Budha' ? 'selected' : '' }}>Budha
                                    </option>
                                </select>
                                @if ($errors->has('agama'))
                                    <span class="help-block">{{ $errors->first('agama') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label for="status_nikah">Status Nikah</label>
                                <select class="form-control" id="status_nikah" name="status_nikah" disabled>
                                    <option value="">-- Pilih Status Nikah --</option>
                                    <option value="Belum Kawin"
                                        {{ $penduduk->status_nikah == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin
                                    </option>
                                    <option value="Kawin" {{ $penduduk->status_nikah == 'Kawin' ? 'selected' : '' }}>Kawin
                                    </option>
                                    <option value="Duda" {{ $penduduk->status_nikah == 'Duda' ? 'selected' : '' }}>Duda
                                    </option>
                                    <option value="Janda" {{ $penduduk->status_nikah == 'Janda' ? 'selected' : '' }}>Janda
                                    </option>
                                </select>
                                @if ($errors->has('status_nikah'))
                                    <span class="help-block">{{ $errors->first('status_nikah') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="telepon">Telp.</label>
                                <input type="text" class="form-control" id="telepon" placeholder="Nomor Telepon"
                                    name="telepon" value="{{ $penduduk->telepon }}" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="handphone">HP</label>
                                <input type="text" class="form-control" id="handphone" placeholder="Handphone"
                                    name="handphone" value="{{ $penduduk->handphone }}" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="jalan">Jalan</label>
                                <input type="text" class="form-control" id="jalan" placeholder="Nama Jalan"
                                    name="jalan" value="{{ $penduduk->jalan }}" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kelurahan">Kelurahan</label>
                                <input type="text" class="form-control" id="kelurahan" placeholder="Nama Kelurahan"
                                    name="kelurahan" value="{{ $penduduk->kelurahan }}" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="dusun">Dusun</label>
                                <input type="text" class="form-control" id="dusun" name="dusun"
                                    value="{{ $penduduk->dusun }}" disabled>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="rt">RT</label>
                                <input type="number" class="form-control" id="rt" name="rt"
                                    value="{{ $penduduk->rt }}" disabled>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="rw">RW</label>
                                <input type="number" class="form-control" id="rw" name="rw"
                                    value="{{ $penduduk->rw }}" disabled>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="kode_pos">Kode Pos</label>
                                <input type="number" class="form-control" id="kode_pos" name="kode_pos"
                                    value="{{ $penduduk->kode_pos }}" disabled>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="email">E-Mail</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="ex. xxx@gmail" value="{{ $penduduk->email }}" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="npwp">NPWP</label>
                                <input type="text" class="form-control" id="npwp" name="npwp"
                                    placeholder="NPWP" value="{{ $penduduk->npwp }}" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="pekerjaan">Pekerjaan</label>
                                <select class="form-control" id="pekerjaan" name="pekerjaan" disabled>
                                    <option value="">-- Pilih Pekerjaan --</option>
                                    <option value="Wiraswasta"
                                        {{ $penduduk->pekerjaan == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                    <option value="Tenaga Pengajar/Instruktur/Fasilitator"
                                        {{ $penduduk->pekerjaan == 'Tenaga Pengajar/Instruktur/Fasilitator' ? 'selected' : '' }}>
                                        Tenaga
                                        Pengajar/Instruktur/Fasilitator</option>
                                    <option value="Petani" {{ $penduduk->pekerjaan == 'Petani' ? 'selected' : '' }}>Petani
                                    </option>
                                    <option value="Pedagang Kecil"
                                        {{ $penduduk->pekerjaan == 'Pedagang Kecil' ? 'selected' : '' }}>Pedagang Kecil
                                    </option>
                                    <option value="Tidak Bekerja"
                                        {{ $penduduk->pekerjaan == 'Tidak Bekerja' ? 'selected' : '' }}>Tidak Bekerja
                                    </option>
                                    <option value="Nelayan" {{ $penduduk->pekerjaan == 'Nelayan' ? 'selected' : '' }}>
                                        Nelayan</option>
                                    <option value="Pedagang Besar"
                                        {{ $penduduk->pekerjaan == 'Pedagang Besar' ? 'selected' : '' }}>Pedagang Besar
                                    </option>
                                    <option value="PNS/TNI/Polri"
                                        {{ $penduduk->pekerjaan == 'PNS/TNI/Polri' ? 'selected' : '' }}>PNS/TNI/Polri
                                    </option>
                                    <option value="Buruh" {{ $penduduk->pekerjaan == 'Buruh' ? 'selected' : '' }}>Buruh
                                    </option>
                                    <option value="Peneliti" {{ $penduduk->pekerjaan == 'Peneliti' ? 'selected' : '' }}>
                                        Peneliti</option>
                                    <option value="Pensiunan" {{ $penduduk->pekerjaan == 'Pensiunan' ? 'selected' : '' }}>
                                        Pensiunan</option>
                                    <option value="Peternak" {{ $penduduk->pekerjaan == 'Peternak' ? 'selected' : '' }}>
                                        Peternak</option>
                                    <option value="Lainnya" {{ $penduduk->pekerjaan == 'Lainnya' ? 'selected' : '' }}>
                                        Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="penghasilan">Penghasilan</label>
                                <select class="form-control" id="penghasilan" name="penghasilan" disabled>
                                    <option value="">-- Pilih Penghasilan --</option>
                                    <option value="Rp. 5.000.000 - Rp. 20.000.000"
                                        {{ $penduduk->penghasilan == 'Rp. 5.000.000 - Rp. 20.000.000' ? 'selected' : '' }}>
                                        Rp. 5.000.000 - Rp. 20.000.000</option>
                                    <option value="Rp. 2.000.000 - Rp. 4.999.999"
                                        {{ $penduduk->penghasilan == 'Rp. 2.000.000 - Rp. 4.999.999' ? 'selected' : '' }}>
                                        Rp. 2.000.000 - Rp. 4.999.999</option>
                                    <option value="Rp. 1.000.000 - Rp. 1.999.999"
                                        {{ $penduduk->penghasilan == 'Rp. 1.000.000 - Rp. 1.999.999' ? 'selected' : '' }}>
                                        Rp. 1.000.000 - Rp. 1.999.999</option>
                                    <option value="Rp. 500.000 - Rp. 999.999"
                                        {{ $penduduk->penghasilan == 'Rp. 500.000 - Rp. 999.999' ? 'selected' : '' }}>Rp.
                                        500.000 - Rp. 999.999</option>
                                    <option value="Lebih dari Rp. 20.000.000"
                                        {{ $penduduk->penghasilan == 'Lebih dari Rp. 20.000.000' ? 'selected' : '' }}>Lebih
                                        dari Rp. 20.000.000</option>
                                    <option value="Kurang dari Rp. 500.000"
                                        {{ $penduduk->penghasilan == 'Kurang dari Rp. 500.000' ? 'selected' : '' }}>Kurang
                                        dari Rp. 500.000</option>
                                </select>
                            </div>
                        </div>

                        <a href="/dashboard" class="btn btn-warning btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fa-solid fa-angles-left fa-beat-fade"></i>
                            </span>
                            <span class="text">Kembali</span>
                        </a>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                </div>
                <div class="card-body">
                    <form action="/profile/update-password" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap"
                                    name="nama" value="{{ $penduduk->user->name }}" disabled>
                                @if ($errors->has('nama'))
                                    <span class="help-block">{{ $errors->first('nama') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="username"
                                    name="username" value="{{ $penduduk->user->username }}" disabled>
                                @if ($errors->has('username'))
                                    <span class="help-block">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <h4><label for="">Ganti Password :</label></h4>
                        <div class="my-3"></div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="current_password">Password Lama</label>
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password"
                                    placeholder="Password Lama" name="current_password">
                                @if ($errors->has('current_password'))
                                    <span class="help-block">{{ $errors->first('current_password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="password">Password Baru</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password Baru"
                                    name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="password_confirmation">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="Konfirmasi Password Baru"
                                    placeholder="Konfirmasi Passsword Baru" name="password_confirmation">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="my-4"></div>
                        <a href="/dashboard" class="btn btn-warning btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fa-solid fa-angles-left fa-beat-fade"></i>
                            </span>
                            <span class="text">Kembali</span>
                        </a>
                        <button type="submit" class="btn btn-primary float-right btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="far fa-save"></i>
                            </span>
                            <span class="text">Ubah Password</span>
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
