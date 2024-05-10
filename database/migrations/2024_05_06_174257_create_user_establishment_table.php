<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserEstablishmentTable extends Migration
{
    public function up()
    {
        Schema::create('user_establishment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('establishment_id');
            $table->foreign('establishment_id')->references('id')->on('establishments')->onDelete('cascade');
            $table->string('role'); // Pode ser 'superuser', 'admin', 'instrutor', 'recepcionista', 'assistente', 'nutricionista', etc.
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_establishment');
    }
}
