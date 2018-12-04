<?php

namespace App\Http\Controllers\API;

//use App\Course;
use App\Http\Controllers\ApiController;
use App\Repositories\CourseRepository as Course;
use Illuminate\Http\Request;

class CourseController extends ApiController
{
    
    protected $course;

    /**
     * __construct
     *
     * @param Course $course
     * @return App\Repositories\CourseRepository
     */
    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$course = Course::orderBy('user_id','desc')->select('id','name')->get();
        $course = $this->course->all();
        return response()->json(['data' => $course], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:6',
        ]);
        $course = $this->course->create($request->all());
        if (!$course) {
 
            return $this->respondProcessingError();
        }

        return $this->respondWithSuccess('Course entry successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $course = Course::findOrFail($id);
        $course = $this->course->find($id);
        if(!$course){
            return $this->respondNotFound('Course does not exist!');
        }
        return response()->json([
            'data'=> $course
        ]);
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
        $request->validate([
            'name' => 'required|string|min:6',
        ]);
        // $course = Course::findOrFail($id);
        // $course->update($request->all());
        $course = $this->course->find($id);
        if (!$course) {
            return $this->respondNotFound('Course does not exist!');
        }
        $course = $this->course->update($request->all(),$id);
        return $this->respondWithSuccess('Course Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = $this->course->find($id);
        if (!$course) {
            return $this->respondNotFound('Course does not exist!');
        }
        $course = $this->course->delete($id);
        return $this->respondWithSuccess('Course Deleted');
    }
}
