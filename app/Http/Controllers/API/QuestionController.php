<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $question = Question::all();
        return response()->json($question,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate([
            'content' => 'required|string|min:6',
            'answer' => 'required',
            'quiz_id' => 'required'
        ]);
        Question::create($request->all());
       
        if(!$question)
        { 
            
            return response()->json(['message'=>'Error with entries made!'],401);
        }
        
        return response()->json(['message'=>'Question Updated!!'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);
        return response()->json($question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate([
            'content' => 'required|string|min:6',
            'answer' => 'required',
            'quiz_id' => 'required'
        ]);
        $question = Question::findOrFail($id);
        $question->update($request->all());
        if(!$question)
        { 
            
            return response()->json(['message'=>'Error with entries made!'],401);
        }
        
        return response()->json(['message'=>'Question Updated!!'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        
        return response()->json(['message'=>'Question Deleted'],200);
    }
}
