<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('payment_status');
            $table->string('payment_for');
            $table->enum('payment_via',['Paystack']);
            $table->longText('payment_details')->nullable();
            $table->string('reference');
            $table->double('amount')->default(0);
            $table->string('paid_at');
            $table->string('payment_id');
            $table->string('ip_address');
            $table->string('attempts')->nullable();
            $table->string('channel');
            $table->string('currency');
            $table->double('fees')->default(0.00);
            $table->string('customer_email');
            $table->string('customer_code')->nullable();
            $table->string('customer_risk_action');
            $table->string('payment_date');
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
        Schema::dropIfExists('payments');
    }
}
