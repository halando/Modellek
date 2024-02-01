<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\UserRegisterChecker;



class AuthController extends Controller
{
    public function register(Request $request){
        $request->validated();
        $input = $request->all();
        $input["password"] = bcrypt($input["password"]);
        $user = User::create($input);


        return $user;
    }
    public function login (Request $request){
        if(Auth::attempt(["name"=>$request->name,"password"=>$request->password ])){

        $authUser = Auth::user();
        $token = $authUser->createToken($request->name."token")->plainTextToken;

        return $token;
        }
    }
}
