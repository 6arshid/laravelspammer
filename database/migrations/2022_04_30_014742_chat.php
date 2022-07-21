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
        Schema::create('chats', function (Blueprint $table) {
            $table->increments('chat_id');
            $table->bigInteger('chat_receiver_id');
            $table->bigInteger('chat_sender_id');
            $table->longtext('chat_message');
            $table->string('chat_sender_ip')->nullable();
            $table->integer('chat_sender_delete')->nullable();
            $table->integer('chat_receiver_delete')->nullable();
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
        Schema::dropIfExists('chats');
    }
};
