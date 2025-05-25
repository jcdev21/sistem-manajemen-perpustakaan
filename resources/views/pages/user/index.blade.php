@extends('layouts.app')

@push('css')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Pengguna</h1>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card">
                <div class="card-header pt-2">
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                </svg>
                            </span>
                            <input type="text" data-kt-table-filter="search" class="form-control form-control-solid w-250px ps-14 filter" placeholder="Search" id="search" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                            {{-- <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#modal-form">Add</a> --}}
                            <a id="add-user" href="{{ route('pengguna.create') }}" class="btn fw-bold btn-sm btn-primary">
                                <i class="fa fa-plus"></i> Tambah Pengguna
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body py-4">
                    <!--begin::Datatable-->
                    <table id="kt_datatable_example_1" class="table align-middle table-row-dashed fs-6 gy-5">
                        <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-50px">#</th>
                                <th>Name</th>
                                <th>jenis</th>
                                <th>No. Telp</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                        </tbody>
                    </table>
                    <!--end::Datatable-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script>
    const KTDatatablesServerSide = function () {
        let table;

        const initDatatable = function () {
            table = new DataTable('#kt_datatable_example_1', {
                searchDelay: 500,
                processing: true,
                serverSide: true,
                ajax: "{{ route('pengguna.index') }}",
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'jenis_pengguna',
                        name: 'jenis_pengguna'
                    },
                    {
                        data: 'no_telepon',
                        name: 'no_telepon'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                ],
            });
            table.on("draw", function () {
                KTMenu.createInstances();
            });
        }

        // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
        const handleSearchDatatable = function () {
            const filterSearch = document.querySelector('[data-kt-table-filter="search"]');
            filterSearch.addEventListener('keyup', function (e) {
                table.search(e.target.value).draw();
            });
        }

        return {
            init: function () {
                initDatatable();
                handleSearchDatatable();
            }
        }
    }();

    // On document ready
    KTUtil.onDOMContentLoaded(function () {
        KTDatatablesServerSide.init();
    });
</script>
@endpush