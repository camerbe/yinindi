<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;


class AuthController extends Controller
{
    //
    public function login(Request $request){
        $loginCredential=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if(Auth::attempt( $loginCredential)){

            $token=auth()->user()->createToken('admin')->accessToken;
            return  response()->json([
                'token'=>$token,
                $cookie=Cookie('jwt',$token,1800),
            ],Response::HTTP_OK)->withCookie($cookie);
        }
        return response([
            'error'=>"Invalid Credentials",
        ],Response::HTTP_UNAUTHORIZED);
    }
    public  function logout(){
        $cookie=Cookie::forget('jwt');
        return response([
            'message'=>'Success',
        ])->withCookie($cookie);
    }

}
