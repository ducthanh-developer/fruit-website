<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('idProduct');
            $table->string('nameProduct', 50);
            $table->unsignedInteger('idCategory');
            $table->tinyInteger('flashSale')->nullable();
            $table->integer('note')->nullable();    
            $table->dateTime('date')->default(DB::raw('CURRENT_TIMESTAMP'));    
            $table->text('description');    
            $table->timestamps();
            $table->foreign('idCategory')->references('idCategory')->on('category')->onUpdate('cascade')->onDelete('cascade');
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
};
