<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('email')->unique();
            $table->string('cv');
            $table->string('phone');
            $table->enum('status',['pending','approved','disapproved'])->default('pending');
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
        Schema::dropIfExists('tutor_application');
    }
}