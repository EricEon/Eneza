<?php

namespace App;

use App\Quiz;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['content','answer','quiz_id'];

    public function quiz()
    {
        $this->belongsTo(Quiz::class);
    }
}
