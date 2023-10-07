@extends('layouts.master')
@section('isi')
    <h1 class="h3 mb-4 text-gray-800">Edit Data Persyaratan</h1>
    <div class="row">
        <div class="col-lg-6">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Data Persyaratan</h6>
                </div>
                <div class="card-body">

                    <form method="POST" action="/data-syarat/{{ $syarat->id }}/update" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="nama_persyaratan">Nama Persyaratan</label>
                                <input type="text" class="form-control @error('nama_persyaratan') is-invalid @enderror"
                                    id="nama_persyaratan" placeholder="Nama Persyaratan" name="nama_persyaratan"
                                    value="{{ $syarat->nama_persyaratan }}">
                                @if ($errors->has('nama_persyaratan'))
                                    <span class="help-block">{{ $errors->first('nama_persyaratan') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="jenis_berkas">Jenis Berkas</label>
                                <select class="form-control @error('jenis_berkas') is-invalid @enderror"
                                    id="jenis_berkas" name="jenis_berkas">
                                    <option value="">-- Pilih Jenis Berkas --</option>
                                    <option value="File" {{ $syarat->jenis_berkas == 'File' ? 'selected' : '' }}>File
                                    </option>
                                    <option value="Teks" {{ $syarat->jenis_berkas == 'Teks' ? 'selected' : '' }}>
                                        Teks
                                    </option>
                                </select>
                                @if ($errors->has('jenis_berkas'))
                                    <span class="help-block">{{ $errors->first('jenis_berkas') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="format">Format Berkas</label>
                                <select class="form-control @error('format') is-invalid @enderror"
                                    id="format" name="format">
                                    <option value="">-- Pilih Format Berkas --</option>
                                    <option value="Gambar" {{ $syarat->format == 'Gambar' ? 'selected' : '' }}>Gambar
                                    </option>
                                    <option value="PDF" {{ $syarat->format == 'PDF' ? 'selected' : '' }}>
                                        PDF
                                    </option>
                                    <option value="DOCX" {{ $syarat->format == 'DOCX' ? 'selected' : '' }}>
                                        DOCX
                                    </option>
                                    <option value="Lainnya" {{ $syarat->format == 'Lainnya' ? 'selected' : '' }}>
                                        Lainnya
                                    </option>
                                </select>
                                @if ($errors->has('format'))
                                    <span class="help-block">{{ $errors->first('format') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="ukuran">Ukuran Berkas dalam satuan kilobyte (kb)</label>
                                <input type="number" class="form-control @error('ukuran') is-invalid @enderror"
                                    id="ukuran" placeholder="Ukuran Berkas dalam satuan kilobyte (kb)" name="ukuran"
                                    value="{{ $syarat->ukuran }}">
                                @if ($errors->has('ukuran'))
                                    <span class="help-block">{{ $errors->first('ukuran') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="file" class="form-label">Contoh Berkas</label>
                                <input type="hidden" name="oldBerkas" value="{{ $syarat->contoh_berkas }}">
                                @if ($syarat->contoh_berkas)
                                    <img src="{{ asset('storage') .'/'. $syarat->contoh_berkas }}" alt=""
                                        class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                @else
                                    <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                @endif
                                <input class="form-control @error('contoh_berkas') is-invalid @enderror" type="file"
                                    id="contoh_berkas" name="contoh_berkas" onchange="previewImage()">
                                @if ($errors->has('contoh_berkas'))
                                    <span class="help-block">{{ $errors->first('contoh_berkas') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="status_persyaratan">Status Persyaratan</label>
                                <select class="form-control @error('status_persyaratan') is-invalid @enderror"
                                    id="status_persyaratan" name="status_persyaratan">
                                    <option value="">-- Pilih Status Persyaratan --</option>
                                    <option value="Wajib" {{ $syarat->status_persyaratan == 'Wajib' ? 'selected' : '' }}>Wajib
                                    </option>
                                    <option value="Opsional" {{ $syarat->status_persyaratan == 'Opsional' ? 'selected' : '' }}>
                                        Opsional
                                    </option>
                                </select>
                                @if ($errors->has('status_persyaratan'))
                                    <span class="help-block">{{ $errors->first('status_persyaratan') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" rows="5" class="form-control @error('keterangan') is-invalid @enderror">{{ $syarat->keterangan }}</textarea>
                                @if ($errors->has('keterangan'))
                                    <span class="help-block">{{ $errors->first('keterangan') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="my-4"></div>
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="far fa-save"></i>
                            </span>
                            <span class="text">Update</span>
                        </button>
                        <a href="/data-syarat" class="btn btn-warning btn-icon-split">
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

@section('js')
    <script>
        function previewImage() {
            const image = document.querySelector('#contoh_berkas');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'blok';

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
