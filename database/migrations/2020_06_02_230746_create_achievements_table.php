<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('appraisee_id')->nullable();
            $table->string('appraiser_id')->nullable();
            $table->unsignedBigInteger('job_desc_id')->nullable();
            $table->text('min_performance_level')->nullable();
            $table->string('comment')->nullable();
            $table->string('score')->nullable();
            $table->enum('status', ['pending', 'rejected', 'approved']);
            $table->string('date_of_completion')->nullable();
            $table->timestamps();

            $table->foreign('appraiser_id')->references('staff_id')->on('users')->onDelete('cascade');
            $table->foreign('appraisee_id')->references('staff_id')->on('users')->onDelete('cascade');
            $table->foreign('job_desc_id')->references('id')->on('job_descriptions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('achievements');
    }
}
