<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;

class Authmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Authorization');
        if(!Auth::guard('api')->check()){

            return response()->json("not logged in",401);
        }
        $user=Auth::guard('api')->user();
        $use=User::find($user->id);
if($use->hasRole('admin')){
    return $next($request);
}
else{
    return response()->json('unautherized access',401);
}


    }
}
