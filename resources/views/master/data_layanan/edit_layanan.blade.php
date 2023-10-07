@extends('layouts.master')
@section('isi')
    <h1 class="h3 mb-4 text-gray-800">Edit Data Layanan</h1>
    <div class="row">
        <div class="col-lg-6">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Data Layanan</h6>
                </div>
                <div class="card-body">

                    <form method="POST" action="/data-layanan/{{ $layanan->id }}/update">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="nama_layanan">Nama Layanan</label>
                                <input type="text" class="form-control" id="nama_layanan" placeholder="Nama Layanan"
                                    name="nama_layanan" value="{{ $layanan->nama_layanan }}">
                                @if ($errors->has('nama_layanan'))
                                    <span class="help-block">{{ $errors->first('nama_layanan') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="status_layanan">Status Layanan</label>
                                <select class="form-control" id="status_layanan" name="status_layanan">
                                    <option value="">-- Pilih Status Layanan --</option>
                                    <option value="YA" {{ $layanan->status_layanan == 'YA' ? 'selected' : '' }}>Ya
                                    </option>
                                    <option value="Tidak" {{ $layanan->status_layanan == 'Tidak' ? 'selected' : '' }}>Tidak
                                    </option>
                                </select>
                                @if ($errors->has('status_layanan'))
                                    <span class="help-block">{{ $errors->first('status_layanan') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="my-4"></div>
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="far fa-save"></i>
                            </span>
                            <span class="text">Simpan</span>
                        </button>
                        <a href="/data-layanan" class="btn btn-warning btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-redo"></i>
                            </span>
                            <span class="text">Kembali</span>
                        </a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

