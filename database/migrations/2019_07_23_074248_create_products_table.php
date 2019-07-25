<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('brand')->nullable();;
            $table->string('supplier')->nullable();;
            $table->string('images')->nullable();;
            $table->integer('quantity')->nullable();;
            $table->string('color')->nullable();;
            $table->string('size')->nullable();;
            $table->integer('priceCore')->nullable();;
            $table->integer('priceSale')->nullable();;
            $table->string('note')->nullable();;
            $table->integer('cat_id');
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
