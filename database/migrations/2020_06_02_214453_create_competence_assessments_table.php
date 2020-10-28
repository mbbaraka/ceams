<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetenceAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competence_assessments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('competence_id');
            $table->string('appraisee_id');
            $table->string('appraiser_id');
            $table->string('evaluation_outcome')->nullable();
            $table->string('comment')->nullable();
            $table->timestamps();

            $table->foreign('competence_id')->references('id')->on('competences')->onDelete('cascade');
            $table->foreign('appraiser_id')->references('staff_id')->on('users')->onDelete('cascade');
            $table->foreign('appraisee_id')->references('staff_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competence_assessments');
    }
}
