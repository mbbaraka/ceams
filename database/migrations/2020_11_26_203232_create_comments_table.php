<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('appraisee_id')->nullable();
            $table->string('appraiser_id')->nullable();
            $table->text('appraiser_comment')->nullable();
            $table->string('date_appraiser_comment')->nullable();
            $table->text('hod_comment')->nullable();
            $table->string('date_hod_comment')->nullable();
            $table->text('dean_comment')->nullable();
            $table->string('date_dean_comment')->nullable();
            $table->text('us_comment')->nullable();
            $table->string('date_us_comment')->nullable();
            $table->text('vc_comment')->nullable();
            $table->string('date_vc_comment')->nullable();
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
        Schema::dropIfExists('comments');
    }
}
