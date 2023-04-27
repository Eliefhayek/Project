<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "image_name"=>"required",
            "title"=>"required"|"unique:banners",
            "sub_title"=>"required"
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Banners $banners)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banners $banners)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banners $banners)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banners $banners)
    {
        //
    }
}
