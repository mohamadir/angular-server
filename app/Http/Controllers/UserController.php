<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //

    public function login(Request $request){
        $user = User::where('email','=',$request->email)->first();
        if(!$user){
            return response()->json(
                ['message' => 'user not found'],401)
                 ;
        }
        if($user->password != $request->password){
            return response()->json(
                ['message' => 'password incorrect'],401)
                 ;
        }
        return response()->json(
            ['message' => 'login successfully','user'=>$user],200)
             ;
    }

    public function getUsers(Request $request){

        $users = User::all();
        
        return $users;
    }
    public function addUser(Request $request){

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return response()->json(
            ['message' => 'success',
             'user' => $user])
             ;
    }

}
