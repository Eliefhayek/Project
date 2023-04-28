<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $serv=Services::all();
        return response()->json($serv);
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
            'Title'=>'required',
            'information'=>'required'
        ]);
        $service=new Services();
        $service->Title= $validatedata['Title'];
        $service->information=$validatedata['information'];
        $service->save();

        return response()->json(['message'=>'Service added succesfully'],201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $serv=Services::find($id);
        if(!$serv){
            return response()->json("id does not exist",404);
        }
        return response()->json($serv);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Services $services)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $serv=Services::find($id);
        if(!$serv){
            return response()->json("id does not exist",404);
        }
        $serv->update($request->all());
        return response()->json($serv);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $serv=Services::find($id);
        if(!$serv){
            return response()->json("id does not exist",404);
        }
        $serv->delete();
        return response()->json('successfully deleted');
    }
}
