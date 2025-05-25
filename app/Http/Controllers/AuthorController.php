<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index(){


        $authors =  Author::all();
//jika data di athor kosong 

    if($authors -> isEmpty()){
        return response() ->json([
        'success' => true,
        'messages' => 'data empty',

        ],200);
}

       //buat fungsi baru 
        return response() -> json([
            'success' => true,
            'Messages' => 'Get All Resources',
            'data' => $authors
        ] , 200);

    }

       //buat fungsi baru 
    public function store (Request $request){
        //validator
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:100',
            'komik' => 'required|string',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'cover_poto' => 'required|image|mimes:jpg,png,jpeg|max:9048',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',
            
        ]);
         //cek validator eror
    if($validator->fails()){
        return response() -> json([
        'success' => false,
        'Messages' =>  $validator->errors()
    ],400);

        }

        $image = $request->file('cover_poto');
        $image->store('authors' , 'public');


            $author = Author::create([
            'name' => $request->name,
            'komik' => $request->komik,
            'stock' => $request->stock,
            'price' => $request->price,
            'cover_poto'=> $image->hashName(),
            'genre_id' => $request->genre_id, 


        ]);

        return response()->json([
                'success' => true,
                'Messages' => 'resources add succesfully',
                'data' => $author,
            ],201);
        } 

    

    }

