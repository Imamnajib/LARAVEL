<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'name' => 'Tere Liye',
            'buku' => 'Matahari',
        ]);

        Book::create([
            'name' => 'Tere Liye',
            'buku' => 'Bulan',
        ]);

        Book::create([
            'name' => 'Tere Liye',
            'buku' => 'Nebula',
        ]);

        Book::create([
            'name' => 'Tere Liye',
            'buku' => 'Komet',
        ]);

        Book::create([
            'name' => 'Tere Liye',
            'buku' => 'Bintang',
        ]);
    }
}
