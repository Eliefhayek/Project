<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function Login(Request $request){
        $validedata=$request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $email=$validedata['email'];
        $password=$validedata['password'];
        $user=User::where('email','=',$email)->first();
        if($user && Hash::check($password,$user->password)){
            Auth::login($user);
            return response()->json('successfully loggedIn');
        }
        return response()->json($user);
    }
    public function Signup(Request $request){

        $validedata=$request->validate([
            'email'=>'required|unique:users,email|email',
            'password'=>'required'
        ]);
        $user=new User();
        $user->email=$validedata['email'];
        $user->password=Hash::make($validedata['password']);
        $user->is_authenticated=false;
        $user->save();

        return response()->json("successfull signup");
    }
    //
}
