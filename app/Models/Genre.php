<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    private $Genres = 
        [
            'fiction' => 'fiction',
            'Non-Fiction' => 'Non-fiction',
            'Science Fiction' => 'Science Fiction',
            'Romance' => 'Romance',
            'Biography' => 'Bioghrapy'
        ];

        public function getGenre() {
            return $this->Genres ;
        }

}
