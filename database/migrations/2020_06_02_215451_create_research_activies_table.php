<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchActiviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_activies', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id');
            $table->string('status')->nullable();
            $table->string('topic')->nullable();
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
        Schema::dropIfExists('research_activies');
    }
}
