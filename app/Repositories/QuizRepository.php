<?php

namespace App\Repositories;

class QuizRepository extends BaseRepository{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Quiz';
    }


}