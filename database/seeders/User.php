<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'nama' => 'John Doe',
            'jenis_pengguna' => 'dosen',
            'alamat' => 'Jl. Contoh Alamat No. 123',
            'no_telepon' => '08123456789',
        ]);

        \App\Models\User::create([
            'nama' => 'Jane Smith',
            'jenis_pengguna' => 'siswa',
            'alamat' => 'Jl. Contoh Alamat No. 456',
            'no_telepon' => '08234567890',
        ]);

        \App\Models\User::create([
            'nama' => 'Alice Johnson',
            'jenis_pengguna' => 'dosen',
            'alamat' => 'Jl. Contoh Alamat No. 789',
            'no_telepon' => '08345678901',
        ]);

        \App\Models\User::create([
            'nama' => 'Bob Brown',
            'jenis_pengguna' => 'siswa',
            'alamat' => 'Jl. Contoh Alamat No. 101',
            'no_telepon' => '08456789012',
        ]);

        \App\Models\User::create([
            'nama' => 'Charlie Davis',
            'jenis_pengguna' => 'siswa',
            'alamat' => 'Jl. Contoh Alamat No. 102',
            'no_telepon' => '08567890123',
        ]);
    }
}
