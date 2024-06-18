<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('api_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('api_user_id');
            $table->string('merchant_request_id');
            $table->boolean('active');
            $table->string('status');
            $table->boolean('completed');
            $table->string('subscription_plan');
            $table->double('amount');
            $table->string('checkout_request_id');
            $table->integer('tries')->nullable();
            $table->string('result_code')->nullable();
            $table->string('result_description')->nullable();
            $table->string('mpesa_receipt_number')->nullable();
            $table->string('transaction_date')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('expiry_date')->nullable();
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
        Schema::dropIfExists('api_subscriptions');
    }
};
