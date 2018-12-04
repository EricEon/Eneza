<?php

namespace App\Repositories;

class CourseRepository extends BaseRepository{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Course';
    }


}