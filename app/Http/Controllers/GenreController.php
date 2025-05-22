<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index() {
        $genres = Genre::all();

        return response() ->json([
            'succes' => true,
            'Messages' => 'Get all resources',
            'data ' => $genres ,
        ] , 200);
    }
}
