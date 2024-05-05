<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSharedWorkoutsTable extends Migration
{
    public function up()
    {
        Schema::create('shared_workouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from_instructor_id');
            $table->foreign('from_instructor_id')->references('id')->on('instrutors')->onDelete('cascade');
            $table->unsignedBigInteger('to_instructor_id');
            $table->foreign('to_instructor_id')->references('id')->on('instrutors')->onDelete('cascade');
            $table->unsignedBigInteger('workout_id');
            $table->foreign('workout_id')->references('id')->on('workouts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shared_workouts');
    }
}