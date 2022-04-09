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
        Schema::create('billdetail', function (Blueprint $table) {
            $table->increments('idBillDetails');
            $table->unsignedInteger('idBill');
            $table->unsignedInteger('idProductDetail');
            $table->double('unitPrice');
            $table->integer('quantity');
            $table->integer('discount')->default(0);
            $table->double('subtotal');
            $table->timestamps();
            $table->foreign('idBill')->references('idBill')->on('bill')->onDelete('cascade');
            $table->foreign('idProductDetail')->references('idProductDetail')->on('productdetail')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billdetail');
    }
};
