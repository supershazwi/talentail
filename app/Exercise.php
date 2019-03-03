<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    public function task() {
        return $this->belongsTo(Task::class);
    }

    public function exercise_files() {
        return $this->hasMany(ExerciseFile::class);
    }

    public function answered_exercises() {
        return $this->hasMany(AnsweredExercise::class);
    }

    public function opportunities() {
        return $this->belongsToMany(Opportunity::class);
    }
}
