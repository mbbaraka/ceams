<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backups', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id')->nullable();
            $table->string('staff_name')->nullable();
            $table->string('appraiser_name')->nullable();
            $table->string('department')->nullable();
            $table->string('faculty')->nullable();
            $table->string('job_title')->nullable();
            $table->string('performance_level')->nullable();
            $table->string('comment')->nullable();
            $table->string('evaluation_outcome')->nullable();
            $table->string('recommendations')->nullable();
            $table->string('appraisee_comment')->nullable();
            $table->string('dean_comment')->nullable();
            $table->string('us_comment')->nullable();
            $table->string('vc_comment')->nullable();
            $table->string('session')->nullable();
            $table->string('date')->nullable();
            $table->string('duration')->nullable();
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
        Schema::dropIfExists('backups');
    }
}
