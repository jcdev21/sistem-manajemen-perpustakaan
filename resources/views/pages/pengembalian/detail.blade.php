@extends('layouts.app')

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Detail Pengembalian</h1>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card">
                <div class="card-header pt-2">
                    <div class="card-body text-gray-700">
                        <div class="d-flex mb-2">
                            <span class="d-block min-w-25 w-25">Buku</span>
                            <span>{{ $pengembalian->peminjaman->buku->judul }}</span>
                        </div>
                        <div class="d-flex mb-2">
                            <span class="d-block min-w-25 w-25">Pengguna</span>
                            <span>{{ $pengembalian->peminjaman->pengguna->nama }}</span>
                        </div>
                        <div class="d-flex mb-2">
                            <span class="d-block min-w-25 w-25">Tanggal Peminjaman</span>
                            <span>{{ $pengembalian->peminjaman->tanggal_pinjam ? \Carbon\Carbon::parse($pengembalian->peminjaman->tanggal_pinjam)->translatedFormat('d F Y') : '-' }}</span>
                        </div>
                        <div class="d-flex mb-2">
                            <span class="d-block min-w-25 w-25">Jadwal Dikembalikan</span>
                            <span>{{ $pengembalian->peminjaman->tanggal_kembali ? \Carbon\Carbon::parse($pengembalian->peminjaman->tanggal_kembali)->translatedFormat('d F Y') : '-' }}</span>
                        </div>
                        <div class="d-flex mb-2">
                            <span class="d-block min-w-25 w-25">Tanggal Pengembalian</span>
                            <span>{{ $pengembalian->tanggal_pengembalian ? \Carbon\Carbon::parse($pengembalian->tanggal_pengembalian)->translatedFormat('d F Y') : '-' }}</span>
                        </div>
                        <div class="d-flex mb-2">
                            <span class="d-block min-w-25 w-25">Denda</span>
                            <span>{{ ($pengembalian->denda > 0) ? 'Rp ' . number_format($pengembalian->denda, 0, ',', '.') : '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection