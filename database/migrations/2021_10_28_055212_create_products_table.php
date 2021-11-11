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
            $table->id();
            $table->string('name');
            $table->bigInteger('product_type_id')->unsigned();
            $table->foreign('product_type_id')->references('id')->on('product_types')->onUpdate('cascade')->onDelete('cascade');
            $table->string('slug')->nullable();
            $table->boolean('status');
            $table->string('image');
            $table->decimal('price');
            $table->integer('quantity_product_sold');
            $table->longText('description');
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
