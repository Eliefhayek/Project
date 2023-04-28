<?php

namespace App\Http\Controllers;

use App\Models\cat_question;
use App\Models\categories;
use App\Models\questions;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;


class questionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ques=questions::all();
        return response()->json($ques);
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
            'questions'=>'required|unique:questions,questions',
            'answer'=>'required',
            'category'=>'required|exists:categories,Title'
        ]);
        $ques=new questions();
        $ques->questions=$validatedata['questions'];
        $ques->answers=$validatedata['answer'];
        $ques->save();
        $x=strval($validatedata['questions']);
        $question= questions::where('questions','=',$x)->first();
        $cate=categories::where('Title','=',$validatedata['category'])->first();
        $cat_quest=new cat_question();
        $cat_quest->category_id=$cate->id;
        $cat_quest->question_id=$question->id;
        $cat_quest->save();
        return response()->json('successfull');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $quest=questions::find($id);
        if(!$quest){
            return response()->json("id does not exist",404);
        }
        return response()->json($quest);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(questions $questions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $quest=questions::find($id);
        if(!$quest){
            return response()->json("id does not exist",404);
        }
        $quest->update($request->all());
        return response()->json($quest);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $quest=questions::find($id);
        if(!$quest){
            return response()->json("id does not exist",404);
        }
        $quest->delete();
        return response()->json('successfully deleted');
    }
}
