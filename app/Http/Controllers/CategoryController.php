<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cat=categories::all();
        return response()->json($cat);
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


        $validatedata= $request->validate([
            'Title'=>'required'
        ]);
        $categorie=new categories();
        $categorie->Title=$validatedata['Title'];
        $categorie->save();
        return response()->json(['message'=>'category added succesfully'],201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $cat=categories::find($id);
        if(!$cat){
            return response()->json("id does not exist",404);
        }
        return response()->json($cat);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $cat=categories::find($id);
        if(!$cat){
            return response()->json("id does not exist",404);
        }
        $cat->update($request->all());
        return response()->json($cat);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $cat=categories::find($id);
        if(!$cat){
            return response()->json("id does not exist",404);
        }
        $cat->delete();
        return response()->json('successfully deleted');

    }
    public function display(){
        $categories = categories::with(['questions' => function($query) {
            $query->orderBy('created_at', 'desc')->paginate(10);
        }])->inRandomOrder()->get();
        return response()->json(['data'=>$categories],200);

    }
}
