<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchGrantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_grants', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id');
            $table->string('research_applied_for')->nullable();
            $table->string('application_date')->nullable();
            $table->enum('is_awarded', ['1', '0']);
            $table->string('date_of_award')->nullable();
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
        Schema::dropIfExists('research_grants');
    }
}
