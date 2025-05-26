@extends('layouts.app')

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Edit Peminjaman</h1>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card mb-5">
                <div class="card-header pt-2">
                    <div class="card-title">
                        <h3>Petunjuk!!</h3>
                    </div>
                    <div class="card-body fs-6 text-gray-700">
                        <ol class="mb-0">
                            <li>
                                Tanggal kembali menentukan batas waktu peminjaman buku.    
                            </li>
                            <li>
                                Tanggal kembali juga akan menentukan denda jika terlambat mengembalikan buku.
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header pt-2">
                    <div class="card-title">
                        <h3>Form Edit Peminjaman</h3>
                    </div>
                </div>
                <div class="card-body py-4">
                    <form class="form" action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-8 d-flex flex-column fv-row">
                            <label class="mb-2 d-flex align-items-center fs-6 fw-semibold">
                                <span class="required">Buku</span>
                            </label>
                            <select id="select-buku" class="form-control form-control-solid form-select" disabled>
                                <option selected>{{ $peminjaman->buku->judul }} - Stok : {{ $peminjaman->buku->stok }}</option>
                            </select>
                        </div>
                        <div class="mb-8 d-flex flex-column fv-row">
                            <label class="mb-2 d-flex align-items-center fs-6 fw-semibold">
                                <span class="required">Peminjam</span>
                            </label>
                            <select id="select-peminjam" class="form-control form-control-solid form-select" disabled>
                                <option selected>{{ $peminjaman->pengguna->nama }} - {{ $peminjaman->pengguna->jenis_pengguna }}</option>
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Tanggal Pinjam</span>
                            </label>
                            <input type="date" class="form-control form-control-solid" placeholder="Masukkan Tanggal Pinjam" name="tanggal_pinjam" value="{{ old('tanggal_pinjam', $peminjaman->tanggal_pinjam) }}" />
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Tanggal Kembali</span>
                            </label>
                            <input type="date" class="form-control form-control-solid" placeholder="Masukkan Tanggal Kembali" name="tanggal_kembali" value="{{ old('tanggal_kembali', $peminjaman->tanggal_kembali) }}" />
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