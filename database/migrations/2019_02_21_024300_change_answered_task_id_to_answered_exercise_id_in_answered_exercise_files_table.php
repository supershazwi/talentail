<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeAnsweredTaskIdToAnsweredExerciseIdInAnsweredExerciseFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answered_exercise_files', function (Blueprint $table) {
            //
            $table->renameColumn('answered_task_id', 'answered_exercise_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answered_exercise_files', function (Blueprint $table) {
            //
            $table->renameColumn('answered_task_id', 'answered_exercise_id');
        });
    }
}
