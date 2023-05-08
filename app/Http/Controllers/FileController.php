<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    //
    public function store(Request $request){
        $validatedData = $request->validate([
            'file' => 'required|file',
        ]);
    $path = $request->file('file')->store('public');

        return response()->json([
            'path' => $path
        ]);
    }
}
