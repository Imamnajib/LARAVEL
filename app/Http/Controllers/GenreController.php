<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

public function update(string $id , Request $request){
      
      // mengupdate data 
        $genres = Genre::find($id);

        if(!$genres){
            return response()->json([
            'success' => false,
            'Messages' => 'Response not found update',
            ],400);
        }


        // validator
        $validator =  Validator::make($request->all(),[
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'cover_poto' => 'nullable|image|mimes:jpg,png,jpeg|max:9048',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',
            ]);

            if($validator->fails()){
                return response()->json([
                'success' => false,
                'messages' => $validator->errors(),
                ],404);
            }

        // siapkan data yang ingin di update 
            $data = [
                'name' => $request ->name,
                'description' => $request ->description,
                'stock' => $request ->stock,
                'price' => $request ->price,
                'genre_id' => $request ->genre_id,
                'author_id' => $request ->author_id,

            ];

        //handel image (upload & delete image)
            if($request->hasFile('cover_poto')){
                $image = $request->file('cover_poto');
                $image -> store('genres' , 'public');
            
            
                if($genres->cover_poto){
                Storage::disk('public')->delete('/Genre' . $genres->cover_poto);
            }

            
            $data['cover_poto'] = $image->hashName();

            }
        //update baru ke database
        $genres -> update($data);

    return response()->json([
        'success' => true,
        'messages' => 'Get all resources update success',
        "data"  => $genres, 
    ],200);
    }

  public function show(string $id){ //menampikan data 

        $genres = Genre::find($id);

        if(!$genres){
            return response() -> json([
                'success' => false,
                'messages' => 'no found'
            ],404);
        }

        return response()->json([
            'success' => true,
            'messages' => 'Get all resources',
            'data' => $genres,
        ],200);
    }


        //menghapus data 
public function destroy(string $id){

    $genres = Genre::find($id);

    // jika id buku tidak ada
    if(!$genres){
        return response()->json([
            'success' => false,
            'Messages' => 'Response not found',
        ],400);
    }

    //untuk menghapus foto yang masih tersimpan di dalam file 
    if($genres){
        Storage::disk('public')->delete('/Genre' . $genres->cover_poto);
    }

    $genres->delete();

          //jika berhasil di hapus 
    return response()->json([
        'success' => true,
        'messages' => 'Get all resources',
        "data"  => $genres, 
    ],200);

    }

}
