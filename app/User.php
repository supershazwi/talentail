<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function experiences() {
        return $this->hasMany(Experience::class);
    }

    public function projects() {
        return $this->hasMany(Project::class);
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function notifications() {
        return $this->hasMany(Notification::class);
    }

    public function roles_gained() {
        return $this->hasMany(RoleGained::class);
    }

    public function attempted_projects() {
        return $this->hasMany(AttemptedProject::class);
    }

    public function answered_tasks() {
        return $this->hasMany(AnsweredTask::class);
    }

    public function answered_task_files() {
        return $this->hasMany(AnsweredTaskFile::class);
    }

    public function reviewed_answered_task_files() {
        return $this->hasMany(ReviewedAnsweredTaskFile::class);
    }
}
