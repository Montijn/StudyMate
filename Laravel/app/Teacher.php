<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'firstname', 'infix', 'lastname'
    ];

    public function TeacherModules()
    {
        return $this->belongsToMany('App\Module', 'module_teachers')
            ->withPivot('is_coordinator');
    }
}
