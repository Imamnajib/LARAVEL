<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
 
    protected $table = 'genres' ; 

    protected $fillable = [
        'name' ,  'description ' , 'stock' , 'price' , 'cover_poto' , 'genre_id' , 'author_id'
    ];

}
