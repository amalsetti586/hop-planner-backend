<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Hash;
Use App\User;
use Tymon\JWTAuth\JWTManager as JWT;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTExceptions;

class UserController extends Controller
{
    public function inscription(request $request){

        $user=User::where('email', $request['email'])->first();
        if($user){
            $response['status']=0;
            $response['message']='email existant';
            $response['code']=409;

        }
        else{
            $user = user::create([
                'nom'=> $request->nom,
                'prenom'=> $request->prenom,
                'email'=> $request->email,
                'password'=>bcrypt($request->password)
            ]);
            $response['status']=1;
            $response['message']='inscription avec succée';
            $response['code']=200;
        }
        return response()->json($response);
    }
    public function login(Request $request){
$credentials = $request->only('email', 'password');
    try {
if(!JWTAuth::attempt($credentials))  {
    $response['status']=0;
    $response['data']=null;
        $response['code']=401;
        $response['message']='email ou password incorrecte';
        return response()->json($response);

}
  } 
catch (JWTException $e) {
        $response['data']=null;
        $response['code']=500;
        $response['message']='not create token';
        return response()->json($response);


    }
    $user=auth()->user();
    $data['token']=auth()->claims([
        'user_id'=>$user->id,
        'email'=>$user->email,
    ])->attempt($credentials);
    $response['data']=$data;
    $response['status']=1;
        $response['code']=200;
        $response['message']='login successfully';
        return response()->json($response);
    }
}
