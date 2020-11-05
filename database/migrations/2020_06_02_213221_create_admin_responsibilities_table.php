<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminResponsibilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void$table->id();
            $table->unsignedBigInteger('staff_id')->nullable();
            $table->string('responsibility')->nullable();
            $table->string('date')->nullable();
            $table->string('duration')->nullable();
            $table->timestamps();
     */
    public function up()
    {
        Schema::create('admin_responsibilities', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id');
            $table->string('responsibility')->nullable();
            $table->string('date')->nullable();
            $table->string('duration')->nullable();
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
        Schema::dropIfExists('admin_responsibilities');
    }
}
