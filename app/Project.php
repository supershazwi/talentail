<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    public function skill() {
    	return $this->belongsTo(Skill::class);
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function tasks() {
    	return $this->hasMany(Task::class);
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function project_files() {
        return $this->hasMany(ProjectFile::class);
    }

    public function competencies()
    {
        return $this->belongsToMany(Competency::class);
    }

    public function attempted_projects() {
        return $this->hasMany(AttemptedProject::class);
    }
}
