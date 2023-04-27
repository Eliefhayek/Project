<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
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
        $validatedata= $request->validate([
            'image_name'=>'required',
            'title'=>'required',
            'sub_title'=>'required',
            'information'=>'required'
        ]);
        $section=new Section();
        $section->image_name= $validatedata['image_name'];
        $section->sub_title= $validatedata['sub_title'];
        $section->title= $validatedata['title'];
        $section->information=$validatedata['information'];
        $section->save();

        return response()->json(['message'=>'Section added succesfully'],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        //
    }
}
