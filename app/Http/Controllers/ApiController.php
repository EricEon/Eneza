<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class ApiController extends Controller{


    protected $StatusCode = 200;

    /**
     * Get the value of StatusCode
     */ 
    public function getStatusCode()
    {
        return $this->StatusCode;
    }

    /**
     * Set the value of StatusCode
     *
     * @return  self
     */ 
    public function setStatusCode($StatusCode)
    {
        $this->StatusCode = $StatusCode;

        return $this;
    }

    public function respondNotFound(String $message = "Not Found")
    {
        return $this->setStatusCode(404)->respondWithError($message);

    }

    public function respondProcessingError(String $message = "Problem working with data!!"){
        return $this->setStatusCode(400)->respondBadRequest($message);
    }


    public function respondWithSuccess(String $message = "Success")
    {
        return response()->json([
            'success'=>[
                'message'=> $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }


    public function respondWithError(String $message = "Error!!")
    {
        return response()->json([
            'error' =>[
                'message' => $message,
                'status_code'=> $this->getStatusCode()
            ]
        ]);
    }

    public function respondBadRequest(String $message= "Request processing failed!!")
    {
        return response()->json([
            'error'=>[
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }
}