<?php

namespace App\Http\Controllers\API;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::orderBy('user_id','desc')->select('id','name')->get();
        return response()->json($course,200);
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
            'name' => 'required|string|min:6'
        ]);
        $course = Course::create($request->all());
        if(!$course)
        { 
            
            return response()->json(['message'=>'Error with entries made!'],401);
        }
        
        return response()->json(['message'=>'Course Updated!!'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return response()->json($course);
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
            'name' => 'required|string|min:6'
        ]);
        $course = Course::findOrFail($id);
        $course->update($request->all());
        if(!$course)
        { 
            
            return response()->json(['message'=>'Error with entries made!'],401);
        }
        
        return response()->json(['message'=>'Course Updated!!'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        
        return response()->json(['message'=>'Course Deleted'],200);
    }
}
