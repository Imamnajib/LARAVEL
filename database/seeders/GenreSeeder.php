<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'name' => 'horor',
            'description' => 'teman tidak mau bayar hutang hahahaha'
        ]);

         Genre::create([
            'name' => 'action',
            'description' => 'berani melampaui limit diri '
        ]);


         Genre::create([
            'name' => 'Romantis',
            'description' => 'Separuh hati'
        ]);
    }
}
