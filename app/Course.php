<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subject;

class Course extends Model
{
    protected $fillable =[
       'name','user_id' 
    ];

    public function subjects()
    {
     $this->hasMany('App\Subject');
    }
}
