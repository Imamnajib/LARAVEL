<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request){
        
    //1.set up validator
    $validator = Validator::make($request->all() , [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:8'
    ]);

     //2.cek validator
    if($validator->fails()){
        return response()->json($validator->errors(),422);
    }
    //3.create user 
    $user = User::create([
        'name' =>$request->name,
        'email' =>$request->email,
        'password'=>$request->password,
    ]);

    //4.cek keberhasilan 
    if($user){
        return response()->json([
            'success' => true,
            'messages' => 'users ger succesfully',
            'data' => $user,
        ],);
    }
    //5.cek gagal 
    return response()->json([
        'sucess' => false,
        'messages' => 'user creation fails',
    
    ],404);

    }
    public function login(Request $request){
    //1.set up validator
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

    //2.cek validator
    if($validator->fails()){
        return response()->json($validator->errors());
    }

    //3.cek kredensial dari request 
    $credentials = $request->only('email' , 'password');
    //4.cek isFailed
    if(!$token = auth()->guard('api')->attempt($credentials)){
        return response()->json([
            'sucess' => false,
            'messages' => 'email and password wrong'
        ],401);
    }
        
    //5.cek isSuccess
      return response()->json([
            'sucess' => true,
            'messages' => 'email and password sucessfully',
            'user' => auth()->guard('api')->user(),
            'token' => $token
        ],202);


    }

    public function logout(Request $request){
        //try
        //invalidate token 
        //cek is sucess

        //catch
        //is failed
        try{
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json([
                'sucess' => true,
                'messages' => 'logout succesfully'
            ],200);
        }catch (JWTException $e){
            return response()->json([
                'sucess' => false,
                'messages' => 'logout failed'
            ]);
        }
    }

}