<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ResetRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PasswordController extends Controller
{
    //
    public function forgot(Request $request){
        $email=$request->input('email');
        $token=Str::random(24);
        DB::table('password_resets')->insert([
            'email'=>$email,
            'token'=>$token
        ]);
        Mail::send('reset', ['token'=>$token], function ($message) use($email,$token) {
            $message->to($email);
            $message->subject('Réinitialisez votre mot de passe');

        });

        return response([
            'message'=>'Vérifier votre courrier',
        ]);
    }

    public function reset (ResetRequest $request)
    {
        $passwordRequest=DB::table('password_resets')->where('token',$request->input('token'))->first();

        ;

        if(!$user=User::where('email',$passwordRequest->email)->first()){
            throw new NotFoundHttpException('User not found');
        }
        $user->password=bcrypt($request->input('password'));
        $user->save();

        return response([
            'message'=>'Success'
        ]);
    }
}