<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class User extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return $this->dataTable();
        }

        return view('pages.user.index');
    }

    private function dataTable()
    {
        $builder = ModelsUser::query()->orderBy('id', 'desc');
        return DataTables::of($builder)
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(CreateUserRequest $request) 
    {
        try {
            ModelsUser::create($request->validated());
            return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal menambahkan pengguna: ' . $e->getMessage()]);
        }
    }
}
