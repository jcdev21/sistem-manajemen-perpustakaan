<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Buku extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Buku::create([
            'judul' => 'Belajar Laravel',
            'penulis' => 'John Doe',
            'penerbit' => 'Tech Publisher',
            'tahun_terbit' => 2023,
            'stok' => 10,
        ]);

        \App\Models\Buku::create([
            'judul' => 'Mastering PHP',
            'penulis' => 'Jane Smith',
            'penerbit' => 'Code Press',
            'tahun_terbit' => 2022,
            'stok' => 5,
        ]);

        \App\Models\Buku::create([
            'judul' => 'Understanding JavaScript',
            'penulis' => 'Alice Johnson',
            'penerbit' => 'Web Dev Books',
            'tahun_terbit' => 2021,
            'stok' => 8,
        ]);

        \App\Models\Buku::create([
            'judul' => 'Database Management with MySQL',
            'penulis' => 'Bob Brown',
            'penerbit' => 'Data Press',
            'tahun_terbit' => 2020,
            'stok' => 12,
        ]);

        \App\Models\Buku::create([
            'judul' => 'CSS for Beginners',
            'penulis' => 'Charlie Green',
            'penerbit' => 'Design Books',
            'tahun_terbit' => 2019,
            'stok' => 7,
        ]);
    }
}
