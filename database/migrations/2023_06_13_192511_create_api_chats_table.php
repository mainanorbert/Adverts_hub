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
        Schema::create('api_chats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('api_user_id');
            $table->foreignId('receiver_id')->nullable();
            $table->string('title');
            $table->boolean('typing')->default(false);
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
        Schema::dropIfExists('api_chats');
    }
};
