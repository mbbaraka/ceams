<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_plans', function (Blueprint $table) {
            $table->id();
            $table->string('appraisee_id')->nullable();
            $table->string('appraiser_id')->nullable();
            $table->string('performance_gap')->nullable();
            $table->string('action_plan')->nullable();
            $table->string('time_frame')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('action_plans');
    }
}
