<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameSkillsToRolesInCompetenciesScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('competency_scores', function (Blueprint $table) {
            $table->renameColumn('skill_gained_id', 'role_gained_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('competency_scores', function (Blueprint $table) {
            $table->renameColumn('role_gained_id', 'skill_gained_id');
        });
    }
}
