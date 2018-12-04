<?php 
namespace App\Repositories;

class SubjectRepository extends BaseRepository{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Subject';
    }


}