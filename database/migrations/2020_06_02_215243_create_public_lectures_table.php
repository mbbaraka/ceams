<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_lectures', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id');
            $table->string('category')->nullable();
            $table->string('topic')->nullable();
            $table->string('venue')->nullable();
            $table->string('date')->nullable();
            $table->timestamps();

            $table->foreign('staff_id')->references('staff_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('public_lectures');
    }
}
