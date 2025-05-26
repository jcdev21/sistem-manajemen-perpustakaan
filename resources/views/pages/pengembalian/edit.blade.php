@extends('layouts.app')

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Edit Pengembalian</h1>
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
                                Terlambat 1 hari, denda Rp. 1000
                            </li>
                            <li>
                                Denda ditentukan dari keterlambatan pengembalian buku.
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header pt-2">
                    <div class="card-title">
                        <h3>Form Edit Pengembalian</h3>
                    </div>
                </div>
                <div class="card-body py-4">
                    <form class="form" action="{{ route('pengembalian.update', $pengembalian->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-8 d-flex flex-column fv-row">
                            <label class="mb-2 d-flex align-items-center fs-6 fw-semibold">
                                <span class="required">Peminjaman</span>
                            </label>
                            <select id="select-peminjaman" class="form-control form-control-solid form-select" disabled>
                                <option>{{ $pengembalian->peminjaman->buku->judul }} - Stok : {{ $pengembalian->peminjaman->pengguna->nama }} | {{ $pengembalian->peminjaman->pengguna->jenis_pengguna }}</option>
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Tanggal Pengembalian</span>
                            </label>
                            <input type="date" class="form-control form-control-solid" placeholder="Masukkan Tanggal Pengembalian" name="tanggal_pengembalian" value="{{ old('tanggal_pengembalian', $pengembalian->tanggal_pengembalian) }}" />
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