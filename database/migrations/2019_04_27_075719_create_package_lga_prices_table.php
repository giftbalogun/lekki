<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageLgaPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_lga_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('package_id')->unisigned();
            $table->integer('lga_id')->unsigned();
            $table->string('price_details', 1000);
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
        Schema::dropIfExists('package_lga_prices');
    }
}
