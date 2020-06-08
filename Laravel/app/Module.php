<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'moduleName', 'year', 'period', 'credits','exam_id'
    ];

    public function TeacherModules()
    {
        return $this->belongsToMany('App\Teacher', 'module_teachers')
            ->withPivot('is_coordinator');
    }

    public function ModuleUsers()
    {
        return $this->belongsToMany('App\User', 'module_users')
            ->withPivot('result', 'file');
    }

    public function Exam()
    {
        return $this->hasOne('App\Exam');
    }
}
