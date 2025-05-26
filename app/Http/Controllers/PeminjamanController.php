<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

Carbon::setLocale('id');

class PeminjamanController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return $this->dataTable();
        }

        return view('pages.peminjaman.index');
    }

    private function dataTable()
    {
        $builder = Peminjaman::with(['buku', 'pengguna', 'pengembalian'])->orderBy('id', 'desc')->get();

        $data = $builder->map(function ($item) {
            return [
                'id' => $item->id,
                'buku' => $item->buku->judul ?? 'N/A',
                'pengguna' => $item->pengguna->nama ?? 'N/A',
                'tanggal_pinjam' => $item->tanggal_pinjam ? Carbon::parse($item->tanggal_pinjam)->translatedFormat('d F Y') : '',
                'tanggal_kembali' => $item->tanggal_kembali ? Carbon::parse($item->tanggal_kembali)->translatedFormat('d F Y') : '',
                'status' => $item->status,
                'dikembalikan' => $item->pengembalian ? true : false,
                'id_pengembalian' => $item->pengembalian ? $item->pengembalian->id : null,
            ];
        });

        return DataTables::of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        $buku_list = Buku::where('stok', '>', 0)->get();
        $peminjam_list = User::get();
        return view('pages.peminjaman.create', compact('buku_list', 'peminjam_list'));
    }

    public function store(CreatePeminjamanRequest $request)
    {
        DB::beginTransaction();
        try {
            $request_data = $request->validated();

            $peminjaman = Peminjaman::create([
                'id_buku' => (int) $request_data['buku'],
                'id_pengguna' => (int) $request_data['peminjam'],
                'tanggal_pinjam' => $request_data['tanggal_pinjam'],
                'tanggal_kembali' => $request_data['tanggal_kembali'],
                'status' => 'dipinjam',
            ]);

            // Update stok buku
            $buku = Buku::find($peminjaman->id_buku);
            $buku->stok -= 1;
            $buku->save();

            DB::commit();
            return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data peminjaman: ' . $e->getMessage());
        }
    }

    public function edit(Peminjaman $peminjaman)
    {
        return view('pages.peminjaman.edit', compact('peminjaman'));
    }

    public function update(UpdatePeminjamanRequest $request, Peminjaman $peminjaman)
    {
        try {
            $peminjaman->update($request->validated());
            return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data peminjaman: ' . $e->getMessage());
        }
    }
}
