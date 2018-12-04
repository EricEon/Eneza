<?php

namespace App\Repositories;

class TutorialRepository extends BaseRepository{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Tutorial';
    }


}