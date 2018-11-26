<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quiz;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quiz = Quiz::all();
        return response()->json($quiz,200);
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
            'name' => 'required|string|min:6',
            'subject_id' => 'required|numeric'
        ]);
        $quiz = Quiz::create($request->all());
        if(!$quiz)
        { 
            
            return response()->json(['message'=>'Error with entries made!'],401);
        }
        
        return response()->json(['message'=>'Quiz Updated!!'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = Quiz::findOrFail($id);
        return response()->json($quiz);
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
            'name' => 'required|string|min:6',
            'subject_id' => 'required|numeric'
        ]);
        $quiz = Quiz::findOrFail($id);
        $quiz->update($request->all());
        if(!$quiz)
        { 
            
            return response()->json(['message'=>'Error with entries made!'],401);
        }
        
        return response()->json(['message'=>'Quiz Updated!!'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();
        
        return response()->json(['message'=>'Quiz Deleted'],200);
    }
}
