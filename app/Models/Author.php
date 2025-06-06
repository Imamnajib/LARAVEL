<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
   protected $table = 'authors';

       protected $fillable = [
        'name' , 'komik' , 'stock' , 'price' , 'cover_poto' , 'genre_id' , 'author_id'
    ];
}
