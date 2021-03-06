<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreWorkChecklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_work_checklists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assessment_id')->constrained('assessments')->onDelete('cascade');
            $table->boolean('ppeInspected');
            $table->boolean('preUseInspections');
            $table->boolean('jobSafety');
            $table->boolean('visualInspections');
            $table->boolean('updatedAssessment');
            $table->boolean('toolCondition');
            $table->boolean('controlZones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre_work_checklists');
    }
}
