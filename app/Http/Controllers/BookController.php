<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index (){ //index ini adalah variabel yg sifatnay central 

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

        public function store (Request $request){ // store ini adalah variabel yang memvalidasi semua atribut 
            //1. validator                                                 dari tabel  yg memang sudah dibuat untuk store
        $validator =  Validator::make($request->all(),[
            'name' => 'required|string|max:100',
            'buku' => 'required|string',
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


        //menampilkan data secara satu-satu 
            public function show(string $id){ //menampikan data 

        $book = Book::find($id);

        if(!$book){
            return response() -> json([
                'success' => false,
                'messages' => 'no found'
            ],404);
        }

        return response()->json([
            'success' => true,
            'messages' => 'Get all resources',
            'data' => $book,
        ],200);
    }

    
    public function update(string $id , Request $request){
      
      // mengupdate data 
        $book = Book::find($id);

        if(!$book){
            return response()->json([
            'success' => false,
            'Messages' => 'Response not found update',
            ],400);
        }


        // validator
        $validator =  Validator::make($request->all(),[
            'name' => 'required|string|max:100',
            'buku' => 'required|string',
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
                'buku' => $request ->buku,
                'stock' => $request ->stock,
                'price' => $request ->price,
                'genre_id' => $request ->genre_id,
                'author_id' => $request ->author_id,

            ];

        //handel image (upload & delete image)
            if($request->hasFile('cover_poto')){
                $image = $request->file('cover_poto');
                $image -> store('books' , 'public');
            
            
                if($book->cover_poto){
                Storage::disk('public')->delete('/Book' . $book->cover_poto);
            }

            
            $data['cover_poto'] = $image->hashName();

            }
        //update baru ke database
        $book -> update($data);

    return response()->json([
        'success' => true,
        'messages' => 'Get all resources update success',
        "data"  => $book, 
    ],200);
    }
    

    //menghapus data 
public function destroy(string $id){

    $book = Book::find($id);

    // jika id buku tidak ada
    if(!$book){
        return response()->json([
            'success' => false,
            'Messages' => 'Response not found',
        ],400);
    }

    //untuk menghapus foto yang masih tersimpan di dalam file 
    if($book){
        Storage::disk('public')->delete('/Book' . $book->cover_poto);
    }

    $book->delete();

          //jika berhasil di hapus 
    return response()->json([
        'success' => true,
        'messages' => 'Get all resources',
        "data"  => $book, 
    ],200);

    }
    
}

        

    


