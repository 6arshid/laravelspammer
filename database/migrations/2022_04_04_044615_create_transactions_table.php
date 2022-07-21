<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('token_id');
            $table->double('crypto_amount');
            $table->double('amount');
            $table->string('address');
            $table->string('pkey');
            $table->boolean('success');
            $table->bigInteger('transaction_receiver_id')->nullable();
            $table->bigInteger('transaction_payer_id')->nullable();
            $table->string('transaction_comment_payer_id')->nullable();
            $table->string('transaction_comment_receiver_id')->nullable();
            $table->boolean('received')->default(0)->nullable();
            $table->timestamps();
            $table->foreign('token_id')->references('id')->on('tokens')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
