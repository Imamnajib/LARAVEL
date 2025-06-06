<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Author::create([
            'name' => 'EiijiroOda',
            'komik' => 'One piece',
             'stock' => 81,
            'price' => 40000,
            'cover_poto' => 'one piece.jpg',
             'genre_id' => 1,
            'author_id' => 1,
        ]);

         Author::create([
            'name' => 'Masashi Kishimoto',
            'komik' => 'Naruto',
             'stock' => 81,
            'price' => 40000,
            'cover_poto' => 'naruto.jpg',
             'genre_id' => 2,
            'author_id' => 2,
        ]);

         Author::create([
            'name' => 'Gosho Aoyama',
            'komik' => 'Detective conan',
             'stock' => 81,
            'price' => 40000,
            'cover_poto' => 'detective conan.jpg',
             'genre_id' => 3,
            'author_id' => 3,
        ]);

         Author::create([
            'name' => 'Akira toriyama',
            'komik' => 'Dragon ball',
             'stock' => 81,
            'price' => 40000,
            'cover_poto' => 'dragon ball.jpg',
             'genre_id' => 4,
            'author_id' => 4,
        ]);

         Author::create([
            'name' => 'Hajime Isayama',
            'komik' => 'Attack on titan',
             'stock' => 81,
            'price' => 40000,
            'cover_poto' => 'attack on titan.jpg',
             'genre_id' => 5,
            'author_id' => 5,
        ]);


       
    }
}
