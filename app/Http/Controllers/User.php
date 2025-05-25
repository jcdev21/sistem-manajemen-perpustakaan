<?php

namespace App\Http\Controllers;

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

    public function dataTable()
    {
        $builder = ModelsUser::query();
        return DataTables::of($builder)
            ->addIndexColumn()
            ->make(true);
    }

    public function clientside()
    {
        $users = ModelsUser::all();
        return view('pages.user.clientside', ['users' => $users]);
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function edit(ModelsUser $user)
    {
        dd($user);
    }
}
