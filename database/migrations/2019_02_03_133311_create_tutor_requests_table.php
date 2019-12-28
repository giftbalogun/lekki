<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->integer('tutor_id')->unsigned();
            $table->enum('tutorial_type',['home','online'])->default('home');
            $table->enum('status', ['pending','approved','disapproved'])->default('approved');
            $table->integer('package_id')->unsigned();
            $table->enum('duration_type',['day', 'week', 'month', 'year', 'hour']);
            $table->integer('duration_amount')->unsigned();
            $table->integer('number_of_children')->unsigned()->nullable();
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
        Schema::dropIfExists('tutor_requests');
    }
}
