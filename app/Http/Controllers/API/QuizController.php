<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Repositories\QuizRepository as Quiz;
//use App\Quiz;

class QuizController extends ApiController
{
    protected $quiz;

    /**
     * __construct
     *
     * @param Quiz $quiz
     * @return App\Repositories\QuizRepository
     */
    public function __construct(Quiz $quiz)
    {
        $this->quiz = $quiz;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$quiz = Quiz::all();
        $quiz = $this->quiz->all();
        return response()->json(['data'=>$quiz],200);
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
            'subject_id' => 'required|numeric'
        ]);
        //$quiz = Quiz::create($request->all());
        $quiz = $this->quiz->create($request->all());
        if(!$quiz)
        { 
            
            return $this->respondProcessingError();
        }
        
        return $this->respondWithSuccess('Quiz Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$quiz = Quiz::findOrFail($id);
        $quiz = $this->quiz->find($id);
        if(!$quiz){
            return $this->respondNotFound('Quiz does not exist!');
        }
        return response()->json(['data' => $quiz]);
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
            'subject_id' => 'required|numeric'
        ]);
        // $quiz = Quiz::findOrFail($id);
        // $quiz->update($request->all());
        $quiz = $this->quiz->find($id);
        if (!$quiz) {
            return $this->respondNotFound('Quiz does not exist!');
        }
        $quiz = $this->quiz->update($request->all(),$id);
        return $this->respondWithSuccess('Quiz updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $quiz = Quiz::findOrFail($id);
        // $quiz->delete();
        $quiz = $this->quiz->find($id);
        if (!$quiz) {
            return $this->respondNotFound('Quiz does not exist!');
        }
        $quiz = $this->quiz->delete($id);
        return $this->respondWithSuccess('Quiz Deleted');
    }
}
