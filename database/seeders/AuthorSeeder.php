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
        ]);

         Author::create([
            'name' => 'Masashi Kishimoto',
            'komik' => 'Naruto',
        ]);

         Author::create([
            'name' => 'Gosho Aoyama',
            'komik' => 'Detective conan',
        ]);

         Author::create([
            'name' => 'Akira toriyama',
            'komik' => 'Dragon ball',
        ]);

         Author::create([
            'name' => 'Hajime Isayama',
            'komik' => 'Attack on titan',
        ]);


       
    }
}
