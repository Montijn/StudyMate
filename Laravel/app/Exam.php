<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
      'name', 'deadline', 'examType'
    ];

    public function Module()
    {
        return $this->belongsTo('App\Module', 'exam_id');
    }

    public function Tags()
    {
        return $this->belongsToMany('App\Tag', 'exam_tags')
            ->withPivot('user_id');
    }
}
