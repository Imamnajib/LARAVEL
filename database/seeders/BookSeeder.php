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
            'stock' => 12,
            'price' => 20000,
            'cover_poto' => 'Matahari.jpg',
            'genre_id' => 1,
            'author_id' => 1,
        ]);

        Book::create([
            'name' => 'Tere Liye',
            'buku' => 'Bulan',
            'stock' => 90,
            'price' => 30000,
            'cover_poto' => 'Bulan.jpg',
            'genre_id' => 2,
            'author_id' => 2,
        ]);

        Book::create([
            'name' => 'Tere Liye',
            'buku' => 'Nebula',
             'stock' => 8,
            'price' => 30000,
            'cover_poto' => 'Nebula.jpg',
             'genre_id' => 3,
            'author_id' => 3,
        ]);

        Book::create([
            'name' => 'Tere Liye',
            'buku' => 'Komet',
             'stock' => 14,
            'price' => 20000,
            'cover_poto' => 'Komet.jpg',
             'genre_id' => 4,
            'author_id' => 4,
        ]);

        Book::create([
            'name' => 'Tere Liye',
            'buku' => 'Bintang',
             'stock' => 81,
            'price' => 40000,
            'cover_poto' => 'Bintang.jpg',
             'genre_id' => 5,
            'author_id' => 5,
        ]);
    }
}
