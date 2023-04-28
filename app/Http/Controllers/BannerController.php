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
       $ban=Banners::all();
       return response()->json($ban);
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
            'sub_title'=>'required'
        ]);
        $banner=new Banners();
        $banner->image_name= $validatedata['image_name'];
        $banner->title=$validatedata['title'];
        $banner->sub_title=$validatedata['sub_title'];
        $banner->save();

        return response()->json(['message'=>'Banner added succesfully'],201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $ban=Banners::find($id);
        if(!$ban){
            return response()->json("id does not exist",404);
        }
        return response()->json($ban);
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
    public function update(Request $request, $id)
    {
        //
        $ban=Banners::find($id);
        if(!$ban){
            return response()->json("id does not exist",404);
        }
        $ban->update($request->all());
        return response()->json($ban);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $ban=Banners::find($id);
        if(!$ban){
            return response()->json("id does not exist",404);
        }
        $ban->delete();
        return response()->json("successfully deleted");
    }
}
