<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'name' , 'buku' , 'stock' , 'price' , 'cover_poto' , 'genre_id' , 'author_id'
    ];
    }