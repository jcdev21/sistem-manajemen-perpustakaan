@extends('layouts.app')

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Tambah Peminjaman</h1>
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
                        <h3>Form Tambah Peminjaman</h3>
                    </div>
                </div>
                <div class="card-body py-4">
                    <form class="form" action="{{ route('peminjaman.store') }}" method="POST">
                        @csrf
                        <div class="mb-8 d-flex flex-column fv-row">
                            <label class="mb-2 d-flex align-items-center fs-6 fw-semibold">
                                <span class="required">Buku</span>
                            </label>
                            <select id="select-buku" name="buku" class="form-control form-control-solid form-select" required>
                                <option></option>
                                @foreach ($buku_list as $buku)
                                    <option value="{{ $buku->id }}">{{ $buku->judul }} - Stok : {{ $buku->stok }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-8 d-flex flex-column fv-row">
                            <label class="mb-2 d-flex align-items-center fs-6 fw-semibold">
                                <span class="required">Peminjam</span>
                            </label>
                            <select id="select-peminjam" name="peminjam" class="form-control form-control-solid form-select" required>
                                <option></option>
                                @foreach ($peminjam_list as $peminjam)
                                    <option value="{{ $peminjam->id }}">{{ $peminjam->nama }} - {{ $peminjam->jenis_pengguna }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Tanggal Pinjam</span>
                            </label>
                            <input type="date" class="form-control form-control-solid" placeholder="Masukkan Tanggal Pinjam" name="tanggal_pinjam" value="{{ old('tanggal_pinjam') }}" />
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Tanggal Kembali</span>
                            </label>
                            <input type="date" class="form-control form-control-solid" placeholder="Masukkan Tanggal Kembali" name="tanggal_kembali" value="{{ old('tanggal_kembali') }}" />
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

@push('script')
<script>
    const KTSelect2 = function () {
        const initSelect2 = function () {
            const $selectBuku = $('#select-buku');
            const $selectPeminjam = $('#select-peminjam');

            $selectBuku.select2({
                placeholder: "Pilih buku",
                allowClear: true,
            });

            $selectPeminjam.select2({
                placeholder: "Pilih peminjam",
                allowClear: true,
            });
        }

        return {
            init: function () {
                initSelect2();
            }
        };
    }();

    KTUtil.onDOMContentLoaded(function () {
        KTSelect2.init();
    });
</script>
@endpush