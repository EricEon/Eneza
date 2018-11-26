<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subject;
use App\Question;

class Quiz extends Model
{
    protected $fillable=['name','subject_id'];

    public function questions()
    {
     $this->hasMany(Question::class);
    }

    public function subject()
    {
        $this->belongsTo(Subject::class);
    }
}
