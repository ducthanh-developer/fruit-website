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
        Schema::create('rating', function (Blueprint $table) {
            $table->increments('idRating');
            $table->tinyInteger('points');
            $table->unsignedInteger('idProduct');
            $table->unsignedInteger('idUser');
            $table->timestamps();
            $table->foreign('idUser')->references('idUser')->on('user');
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
        Schema::dropIfExists('rating');
    }
};