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
        Schema::create('productdetail', function (Blueprint $table) {
            $table->increments('idProductDetail');
            $table->unsignedInteger('idProduct');
            $table->double('price');
            $table->text('imgUrl');
            $table->integer('quantity')->nullable();
            $table->timestamps();
            $table->foreign('idProduct')->references('idProduct')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productdetail');
    }
};
