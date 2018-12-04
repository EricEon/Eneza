<?php

namespace App\Http\Controllers\API;

//use App\Subject;
use App\Repositories\SubjectRepository as Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class SubjectController extends ApiController
{
    protected $subject;

    /**
     * __construct
     *
     * @param Subject $subject
     * @return App\Repositories\SubjectRepository
     */
    public function __construct(subject $subject)
    {
        $this->subject = $subject;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$subject = Subject::all();
        $subject = $this->subject->all();
        return response()->json(['data' => $subject],200);
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
            'name'=> 'required|string|min:6',
            'subject_id' => 'required|numeric'
        ]);
        //$subject = Subject::create($request->all());
        $subject = $this->subject->create($request->all());
        if (!$subject) {

            return $this->respondProcessingError();
        }

        
        return $this->respondWithSuccess('Subject Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$subject = Subject::findOrFail($id);
        $subject = $this->subject->find($id);
        if (!$subject) {
            return $this->respondNotFound('Subject does not exist!');
        }
        return response()->json(['data' => $subject]);
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
            'name'=> 'required|string|min:6',
            'subject_id' => 'required|numeric'
        ]);
        //$subject = Subject::create($request->all());
        $subject = $this->subject->find($id);
        if (!$subject) {
            return $this->respondNotFound('Subject does not exist!');
        }
        $subject = $this->subject->update($request->all(),$id);
        
        return $this->respondWithSuccess('Subject Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $subject = Subject::findOrFail($id);
        // $subject->delete();
        $subject = $this->subject->find($id);
        if (!$subject) {
            return $this->respondNotFound('Subject does not exist!');
        }
        $subject = $this->subject->delete($id);
        return $this->respondWithSuccess('Subject Deleted');
    }
}
