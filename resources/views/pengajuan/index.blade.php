@extends('layouts.master')
@section('isi')
    <h1 class="h3 mb-4 text-gray-800">Pengajuan Layanan Baru</h1>
    <div class="row">
        <div class="col-lg-6">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Data Pengajuan Layanan</h6>
                </div>
                <div class="card-body">

                    <form method="POST" action="/pengajuan-pelayanan/isi-berkas">
                        @csrf
                        <div class="form-group col-md-12">
                            <label for="id_layanan">Jenis Layanan</label>
                            <select class="form-control @error('id_layanan') is-invalid @enderror" id="id_layanan" name="id_layanan">
                                <option value="">-- Pilih Jenis Layanan --</option>
                                @foreach ($data as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_layanan }}</option>
                                @endforeach

                            </select>
                            @if ($errors->has('id_layanan'))
                                <span class="help-block">{{ $errors->first('id_layanan') }}</span>
                            @endif
                        </div>
                        <hr>

                        <div class="my-4"></div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary btn-icon-split float-right">
                                <span class="icon text-white-50">
                                    <i class="fa-solid fa-angles-right fa-beat-fade"></i>
                                </span>
                                <span class="text">Lanjut</span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
