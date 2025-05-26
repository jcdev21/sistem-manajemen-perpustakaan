<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePengembalianRequest;
use App\Http\Requests\UpdatePengembalianRequest;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

Carbon::setLocale('id');

class PengembalianController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return $this->dataTable();
        }

        return view('pages.pengembalian.index');
    }

    private function dataTable()
    {
        $builder = Pengembalian::with(['peminjaman'])->orderBy('id', 'desc')->get();

        $data = $builder->map(function ($item) {
            return [
                'id' => $item->id,
                'buku' => $item->peminjaman->buku->judul ?? 'N/A',
                'pengguna' => $item->peminjaman->pengguna->nama ?? 'N/A',
                'tanggal_pengembalian' => $item->tanggal_pengembalian ? Carbon::parse($item->tanggal_pengembalian)->translatedFormat('d F Y') : '',
                'denda' => ($item->denda > 0) ? 'Rp ' . number_format($item->denda, 0, ',', '.') : '-',
            ];
        });

        return DataTables::of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        $peminjaman_list = Peminjaman::where('status', '!=', 'dikembalikan')->get();
        return view('pages.pengembalian.create', compact('peminjaman_list'));
    }

    public function store(CreatePengembalianRequest $request)
    {
        DB::beginTransaction();
        try {
            $request_data = $request->validated();

            $peminjaman = Peminjaman::find((int) $request_data['peminjaman']);

            $pengembalian = Pengembalian::create([
                'id_peminjaman' => (int) $request_data['peminjaman'],
                'tanggal_pengembalian' => $request_data['tanggal_pengembalian'],
                'denda' => $this->calculateDenda($peminjaman->tanggal_kembali, $request_data['tanggal_pengembalian']),
            ]);

            // Update status peminjaman
            $peminjaman->status = 'dikembalikan';
            $peminjaman->save();

            // Update stok buku
            $buku = Buku::find($peminjaman->id_buku);
            $buku->stok += 1;
            $buku->save();

            DB::commit();
            return redirect()->route('pengembalian.index')->with('success', 'Data pengembalian berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data pengembalian: ' . $e->getMessage());
        }
    }

    private function calculateDenda($jadwal_kembali, $tanggal_dikembalikan)
    {
        $denda_per_hari = 1000;
        $tanggal_dikembalikan_parse = Carbon::parse($tanggal_dikembalikan);
        $jadwal_kembali_parse = Carbon::parse($jadwal_kembali);

        if ($tanggal_dikembalikan_parse->greaterThan($jadwal_kembali_parse)) {
            $selisih_hari = $tanggal_dikembalikan_parse->diffInDays($jadwal_kembali_parse);
            return $selisih_hari * $denda_per_hari;
        }

        return 0; // Tidak ada denda jika dikembalikan tepat waktu
    }

    public function show(Pengembalian $pengembalian)
    {
        return view('pages.pengembalian.detail', compact('pengembalian'));
    }

    public function edit(Pengembalian $pengembalian)
    {
        return view('pages.pengembalian.edit', compact('pengembalian'));
    }

    public function update(UpdatePengembalianRequest $request, Pengembalian $pengembalian)
    {
        try {
            $request_data = $request->validated();
            $pengembalian->tanggal_pengembalian = $request_data['tanggal_pengembalian'];
            $pengembalian->denda = $this->calculateDenda($pengembalian->peminjaman->tanggal_kembali, $request_data['tanggal_pengembalian']);
            $pengembalian->update();
            return redirect()->route('pengembalian.index')->with('success', 'Data pengembalian berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data pengembalian: ' . $e->getMessage());
        }
    }
}
