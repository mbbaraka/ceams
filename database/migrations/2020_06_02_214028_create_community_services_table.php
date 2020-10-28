<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunityServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_services', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id');
            $table->string('activity')->nullable();
            $table->string('date')->nullable();
            $table->string('venue')->nullable();
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
        Schema::dropIfExists('community_services');
    }
}
