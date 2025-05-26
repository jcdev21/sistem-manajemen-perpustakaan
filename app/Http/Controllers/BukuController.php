<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBukuRequest;
use App\Models\Buku;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return $this->dataTable();
        }

        return view('pages.buku.index');
    }

    private function dataTable()
    {
        $builder = Buku::query()->orderBy('id', 'desc');
        return DataTables::of($builder)
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBukuRequest $request)
    {
        try {
            Buku::create($request->validated());
            return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data buku: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
