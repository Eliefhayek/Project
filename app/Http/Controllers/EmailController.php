<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyMail;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class EmailController extends Controller
{
    //
    public function sendEmail(Request $request)
    {
        $user = User::find($request->user_id);

        Mail::to($user->email)->send(new MyMail($user));

        return response()->json(['message' => 'Email sent'], 200);
    }
}
