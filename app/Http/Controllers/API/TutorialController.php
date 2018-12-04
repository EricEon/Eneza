<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Repositories\TutorialRepository as Tutorial;
//use App\Tutorial;

class TutorialController extends ApiController
{
    protected $tutorial;

    /**
     * __construct
     *
     * @param Tutorial $tutorial
     * @return App\Repositories\TutorialRepository
     */
    public function __construct(Tutorial $tutorial)
    {
        $this->tutorial = $tutorial;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$tutorial = Tutorial::orderBy('subject_id','desc')->get();
        $tutorial = $this->tutorial->paginate(4);
        return response()->json(['data' => $tutorial],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$tutorial = Tutorial::create($request->all());
        $request->validate([
            'content' => 'required|string|min:8',
            'subject_id' => 'required|numeric'
        ]);
        $tutorial = $this->tutorial->create($request->all());
        if (!$tutorial) {
            return $this->respondNotFound('Tutorial does not exist!');
        }
        
        return $this->respondWithSuccess('Tutorial Created!'); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$tutorial = Tutorial::findOrFail($id);
        $tutorial = $this->tutorial->find($id);
        if(!$tutorial){
            return $this->respondNotFound('Tutorial does not exist!');
        }
        return response()->json(['data' => $tutorial]);
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
        //$tutorial = Tutorial::findOrFail($id);
        //$tutorial->update($request->all());
        $request->validate([
            'content' => 'required|string|min:8',
            'subject_id' => 'required|numeric'
        ]);
        $tutorial = $this->tutorial->find($id);
        if (!$tutorial) {
            return $this->respondNotFound('Tutorial does not exist!');
        }
        $tutorial = $this->tutorial->update($request->all(),$id);
        
        return $this->respondWithSuccess('Tutorial Updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $tutorial = Tutorial::findOrFail($id);
        // $tutorial->delete();
        $tutorial = $this->tutorial->find($id);
        if (!$tutorial) {
            return $this->respondNotFound('Tutorial does not exist!');
        }
        $tutorial = $this->tutorial->delete($id);
        return $this->respondWithSuccess('Tutorial Deleted!');
    }
}
