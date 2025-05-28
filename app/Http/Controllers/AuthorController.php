<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\Type\FalseType;

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

    // Show

    public function show(string $id){

        $authors = Author::find($id);

        if(!$authors){
            return response()->json([
                'success' => false,
                'messages' => 'not found show'

            ],400);
        }
        return response()->json([
                'suceess' => true,
                'messages' => 'get data show',
                'data' => $authors,
        ],200);

}
    //update 

    public function update(string $id , Request $request){
        //mengupdate data 
        $authors = Author::find($id);

    if (!$authors){
        return response()->json([
        'success' => False,
        'Messages' => 'update no found',
        ]);
    }

        //validator
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:100',
            'komik' => 'required|string',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'cover_poto' => 'nullable|image|mimes:jpg,png,jpeg|max:9048',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',
        ]);

        if($validator->fails()){
            return response()->json([
            'success' => false,
            'Messages' => $validator->errors()
            ],200);
        }
        // siapkan data yang ingin di update
        $data = [
                'name'=>$request->name,
                'komik'=>$request->komik, 
                'stock'=>$request->stock, 
                'price'=>$request->price,
                'cover_poto'=>$request->cover_poto,
                'genre_id'=>$request->genre_id,
                'author_id'=>$request->author_id,
        ];

        //  handel image (upload & delete image)
            if($request->hasFile('cover_poto')){
                $image = $request->file('cover_poto');
                $image -> store('authors' , 'public');
            
            
                if($authors->cover_poto){
                Storage::disk('public')->delete('/Author' . $authors->cover_poto);
            }

            
            $data['cover_poto'] = $image->hashName();

            }
        //update baru ke database
        $authors -> update($data);

    return response()->json([
        'success' => true,
        'messages' => 'Get all resources update success',
        "data"  => $authors, 
    ],200);
    

    }





        //Delete
    public function destroy(string $id){
        $authors = Author::find($id);

        if(!$authors){
        return response()->json([
        'success' => false,
        'messages' => 'not found delete'
        ]);
    }
    //untuk menghapus data
    if($authors){
        Storage::disk('public')->delete("/Authors" . $authors->cover_poto);
    }

    $authors->delete();

    //jika data berhasil di hapus
        return response()->json([
            'sucess' => true,
            'messages' => 'data delete',
            'data' => $authors,

        ],200);

    }


    }

