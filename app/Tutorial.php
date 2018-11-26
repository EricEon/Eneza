<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tutorial;

class Tutorial extends Model
{
    protected $fillable=['content','subject_id'];

    public function subject()
    {
        $this->belongsTo(Subject::class);
    }
}
