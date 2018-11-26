<?php

namespace App\Http\Controllers\API;

use App\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject = Subject::all();
        return response()->json($subject,200);
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
            'name'=> 'required|string|min:6',
            'course_id' => 'required|numeric'
        ]);
        $course = Subject::create($request->all());
        if(!$subject)
        { 
            
            return response()->json(['message'=>'Error with entries made!'],401);
        }
        
        return response()->json(['message'=>'Subject Updated!!'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::findOrFail($id);
        return response()->json($subject);
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
            'name'=> 'required|string|min:6',
            'subject_id' => 'required|numeric'
        ]);
        $subject = Subject::create($request->all());
        if(!$subject)
        { 
            
            return response()->json(['message'=>'Error with entries made!'],401);
        }
        
        return response()->json(['message'=>'Subject Updated!!'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        
        return response()->json(['message'=>'Subject Deleted'],200);
    }
}
