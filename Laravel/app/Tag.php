<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function Exams()
    {
        return $this->belongsToMany('App\Exams', 'exam_tags');
    }

    public function Users()
    {
        return $this->belongsToMany('App\User', 'exam_tags');
    }


}
