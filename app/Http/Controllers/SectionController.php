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
        $sec=Section::all();
        return response()->json($sec);
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
    public function show($id)
    {
        //
        $sect=Section::find($id);
        if(!$sect){
            return response()->json("id does not exist",404);
        }
        return response()->json($sect);
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
    public function update(Request $request, $id)
    {
        //
        $sect=Section::find($id);
        if(!$sect){
            return response()->json("id does not exist",404);
        }
        $sect->update($request->all());
        return response()->json($sect);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $sect=Section::find($id);
        if(!$sect){
            return response()->json("id does not exist",404);
        }
        $sect->delete();
        return response()->json("successfully deleted");

    }
    public function section(){
        $sections=Section::orderBy('created_at','desc')->paginate(3);
        return response()->json(['sections'=>$sections],200);
    }
}
