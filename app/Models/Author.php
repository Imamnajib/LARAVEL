<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    private $Authors = 
        [
            'George Orwell' => 'George Orwell',
            'Jane Austen' => 'Jane Austen',
            'Haruki Murakami' => 'Haruki Murakami',
            'Michelle Obama' => 'Michelle Obama',
            'Stephen Hawking' => 'Stephen Hawking'

        ];
        
        public function getAuthor() {
            return $this->Authors;
        }
}
