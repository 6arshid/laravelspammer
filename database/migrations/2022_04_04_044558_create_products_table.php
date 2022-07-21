<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_name');
            $table->double('product_price');
            $table->string('product_image')->nullable();
            $table->longtext('product_description')->nullable();
            $table->integer('product_nft')->nullable();
            $table->bigInteger('product_user_id');
            $table->bigInteger('product_owner_id')->nullable();
            $table->string('product_source')->nullable();
            $table->longText('product_slug')->nullable();
            $table->longtext('product_uniqid')->nullable();
            $table->bigInteger('product_view')->nullable();
            $table->string('product_city')->nullable();
            $table->string('product_country')->nullable();
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
        Schema::dropIfExists('products');
    }
}
