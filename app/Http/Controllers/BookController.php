<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index (){

    $books =  Book::all();

if ($books -> isEmpty()){
            return response()->json([
                'success' => true,
                'Messages' => 'Resources not Found',
            ] ,200) ;
        }


    return response() -> json([
        'succes' => true,
        'Messages' => 'Get All Resources',
        'data' => $books,
    ]  ,200);
    }

        public function store (Request $request){
            //1. validator
        $validator =  Validator::make($request->all(),[
            'name' => 'required|string|max:100',
            'komik' => 'required|string',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'cover_poto' => 'required|image|mimes:jpg,png,jpeg|max:9048',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',
            ]);

            //2. check validator eror
        if($validator->fails()){
            return response() -> json([
                'success' => false,
                'messages' => $validator->errors()
            ],422);
        }


            //3.  upload image 
           $image = $request->file('cover_poto');
           $image->store('books' , 'public');


            //4. insert data 
          $book = Book::create([
            'name' => $request->name,
            'buku' => $request->buku,
            'stock' => $request->stock,
            'price' => $request->price,
            'cover_poto'=> $image->hashName(),
            'genre_id' => $request-> genre_id, 
            'author_id' => $request-> author_id,

           ]);

            //5. response
            return response()->json([
                'success' => true,
                'messages' => 'resources add succesfully',
                'data' => $book,
            ],201);
    
}


}

