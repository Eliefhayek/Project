<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function privateStore(Request $request){
        $validatedData = $request->validate([
            'file' => 'required|file',
        ]);
        $path = $request->file('file')->store('private');
        return response()->json([
            'path' => $path
        ]);
    }
    public function getPrivateImages()
{
    $files = Storage::files('private');

    $images = [];
    foreach ($files as $file) {
        $images[] = Storage::url($file);
    }

    return response()->json($images);
}

}
