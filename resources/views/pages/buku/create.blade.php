@extends('layouts.app')

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Tambah Buku</h1>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card">
                <div class="card-header pt-2">
                    <div class="card-title">
                        <h3>Form Tambah Buku</h3>
                    </div>
                </div>
                <div class="card-body py-4">
                    <form class="form" action="{{ route('buku.store') }}" method="POST">
                        @csrf
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Judul</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder="Masukkan Judul" name="judul" value="{{ old('judul') }}" />
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span>Penulis</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder="Masukkan Penulis" name="penulis" value="{{ old('penulis') }}" />
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span>Penerbit</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder="Masukkan Penerbit" name="penerbit" value="{{ old('penerbit') }}" />
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span>Tahun Terbit</span>
                            </label>
                            <input type="number" class="form-control form-control-solid" placeholder="Masukkan Tahun Terbit" name="tahun_terbit" value="{{ old('tahun_terbit') }}" min="1900" max="2100" />
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span>Stok</span>
                            </label>
                            <input type="number" class="form-control form-control-solid" placeholder="Masukkan Stok" name="stok" value="{{ old('stok') }}" min="0" />
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
@endsection