@extends('layouts.master')
@section('isi')
    <h1 class="h3 mb-4 text-gray-800">Edit dan Reset Password User</h1>
    <div class="row">
        <div class="col-lg-6">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Data User</h6>
                </div>
                <div class="card-body">

                    <form method="POST" action="/data-user/{{ $user->id }}/update">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" placeholder="Nama user"
                                    name="name" value="{{ $user->name }}" disabled>
                                @if ($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="Email" name="email"
                                    value="{{ $user->email }}" disabled>
                                @if ($errors->has('email'))
                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>

                        <hr>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="username">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Nama user"
                                    name="username" value="{{ $user->username }}">
                                @if ($errors->has('username'))
                                    <span class="help-block">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="role">Role User</label>
                                <select class="form-control @error('role') is-invalid @enderror" id="role" name="role">
                                    <option value="">-- Pilih Role User --</option>
                                    <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin
                                    </option>
                                    <option value="Pimpinan" {{ $user->role == 'Pimpinan' ? 'selected' : '' }}>Pimpinan
                                    </option>
                                    <option value="Warga" {{ $user->role == 'Warga' ? 'selected' : '' }}>Warga
                                    </option>
                                </select>
                                @if ($errors->has('role'))
                                    <span class="help-block">{{ $errors->first('role') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" value="1" type="checkbox" id="reset_passw"
                                        name="reset_passw">
                                    <label class="form-check-label" for="reset_passw">
                                        Reset Passsword [Centang jika ingin mereset password]
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="my-4"></div>
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="far fa-save"></i>
                            </span>
                            <span class="text">Simpan</span>
                        </button>
                        <a href="/data-user" class="btn btn-warning btn-icon-split">
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
