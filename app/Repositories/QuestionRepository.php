<?php

namespace App\Repositories;

class QuestionRepository extends BaseRepository{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Question';
    }


}