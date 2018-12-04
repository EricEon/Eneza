<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Repositories\QuestionRepository as Question;
//use App\Question;

class QuestionController extends ApiController
{
    protected $question;

    public function __construct(Question $question) {
        $this->question = $question;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //$question = Question::all();
        $question = $this->question->paginate();
        return response()->json(['data' => $question]);
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
            'content' => 'required|string|min:6',
            'answer' => 'required',
            'quiz_id' => 'required'
        ]);
        $question = $this->question->create($request->all());
       
        if(!$question)
        { 
            
            return $this->respondProcessingError();
        }
        
        return $this->respondWithSuccess('Question Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$question = Question::findOrFail($id);
        $question = $this->question->find($id);
        if(!$question){
            return $this->respondNotFound('Question does not exist!');
        }
        return response()->json(['data' => $question]);
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
            'content' => 'required|string|min:6',
            'answer' => 'required',
            'quiz_id' => 'required'
        ]);
        // $question = Question::findOrFail($id);
        // $question->update($request->all());
        $question = $this->question->find($id);
        if (!$question) {
            return $this->respondNotFound('Question does not exist!');
        }
        $question = $this->question->update($request->all(),$id);
        return $this->respondWithSuccess('Question Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $question = Question::findOrFail($id);
        // $question->delete();
        
        $question = $this->question->find($id);
        if (!$question) {
            return $this->respondNotFound('Question does not exist!');
        }
        $question = $this->question->delete($id);
        return $this->respondWithSuccess('Question Deleted');
    }
}
