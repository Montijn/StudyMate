<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'infix', 'lastname', 'role', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ModuleUsers()
    {
        return $this->belongsToMany('App\Module', 'module_users')
            ->withPivot('result', 'file');
    }

    public function Modules()
    {
        return $this->belongsToMany('App\Module', 'module_users');
    }

    public function ModulesResults()
    {
        return $this->belongsToMany('App\Module', 'module_users')
            ->withPivot('result');
    }

    public function PeriodCredits($year, $period)
    {
        $modules = $this->ModulesResults()
            ->where('year', '=', $year)
            ->where('period', '=', $period)
            ->where('result', '>', '5.5');

        $total = $modules->sum('credits');
        return $total;
    }
}
