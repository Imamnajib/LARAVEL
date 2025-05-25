<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function index() {
        $genres = Genre::all();


    if($genres -> isEmpty()){
        return response()->json([
            'success' => false,
            'Messages' => 'empty',
        ]);

    }

        return response() ->json([
            'succes' => true,
            'Messages' => 'Get all resources',
            'data ' => $genres ,
        ] , 200);
    }

    // VALIDATOR
public function store (Request $request){
    $validator = Validator::make($request->all(),[
        'name' => 'required|string|max:100',
        'description' => 'required|string',
        'stock' => 'required|integer',
        'price' => 'required|numeric',
        'cover_poto' => 'required|image|mimes:jpg,png,jpeg|max:9048',
        'genre_id' => 'required|exists:genres,id',
        'author_id' => 'required|exists:authors,id',
    ]);

    // Jika validator eror

    if($validator ->fails()){
        response()->json([
            'success' => false,
            'Messages' => $validator->errors(),
        ]);
    }
         //cover poto
    $image = $request->file('cover_poto');
    $image->store('genres', 'public');

       //insert data

        $genres = Genre::create([
            'name' => $request->name,
            'description' => $request->description,
            'stock' => $request->stock,
            'price' => $request->price,
            'cover_poto'=> $image->hashName(),
            'genre_id' => $request-> genre_id, 
            'author_id' => $request-> author_id,

        ]);

           //respon
        return response()->json([
            'success' => true,
            'Messages' => 'Get all resources' ,
            "data" => $genres,
            ]);
} 




}
