<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Spatie\QueryBuilder\QueryBuilder;

class LoginController extends Controller
{
    public function Login(Request $request){
        $validedata=$request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $user = User::where('email', $request->email)->first();
        $credentials=$request->only('email','password');
        if(Auth::attempt($credentials)){
            $token = $user->createToken('Laravel Password Grant Client')->accessToken;
            return response()->json([
                'status_code' => 200,
                'access_token' => $token,
                'token_type' => 'Bearer',
              ]);
        }
        else{
            return response()->json('no good');
        }
    }
    public function Signup(Request $request){

        $validedata=$request->validate([
            'email'=>'required|unique:users,email|email',
            'password'=>'required'
        ]);
      /*  $user=new User();
        $user->email=$validedata['email'];
        $user->password=Hash::make($validedata['password']);
        $user->is_authenticated=false;
        $user->save();*/
        $admin=User::create([
            'email' => 'admin@example.com',
            'password' => Hash::make($validedata['password']),
            'is_authenticated'=>false
        ]);
        $admin->assignRole('admin');
        $editor = User::create([
            'email' => 'editor@example.com',
            'password' => Hash::make('password'),
            'is_authenticated'=>false
        ]);
        $editor->assignRole('editor');
        return response()->json("successfull signup");
    }
    //
    public function displayUser(){
       # return response()->json('Users',200);
        $users=QueryBuilder::for(User::class)
        ->allowedSorts('id')
        ->whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])
        ->get();
        return response()->json(['Users'=>$users],200);
    }
}
