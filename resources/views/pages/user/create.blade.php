@extends('layouts.app')

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Tambah Pengguna</h1>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card">
                <div class="card-header pt-2">
                    <div class="card-title">
                        <h3>Form</h3>
                    </div>
                </div>
                <div class="card-body py-4">
                    <div class="w-50">
                        <form class="form" action="{{ route('pengguna.store') }}" method="POST">
                            @csrf
                            <div class="d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Nama</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder="Masukkan Nama" name="nama" value="{{ old('nama') }}" />
                            </div>
                            <div class="d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Jenis Pengguna</span>
                                </label>
                                <select name="jenis_pengguna" class="form-select form-select-solid" data-control="select2" data-placeholder="Pilih Jenis">
                                    <option value="">Pilih Jenis Pengguna</option>
                                    <option value="dosen" {{ old('jenis_pengguna') == 'dosen' ? 'selected' : '' }}>Dosen</option>
                                    <option value="siswa" {{ old('jenis_pengguna') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                                </select>
                            </div>
                            <div class="d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span>No Telepon</span>
                                </label>
                                <input type="number" class="form-control form-control-solid" placeholder="Masukkan No Telepon" name="no_telepon" value="{{ old('no_telepon') }}" />
                            </div>
                            <div class="d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span>Alamat</span>
                                </label>
                                <textarea class="form-control form-control-solid" placeholder="Masukkan Alamat" name="alamat" rows="4">{{ old('alamat') }}</textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <span class="indicator-label">Submit</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection