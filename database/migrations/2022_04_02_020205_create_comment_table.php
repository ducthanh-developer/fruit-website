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
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('idComment');
<<<<<<< HEAD
=======
            $table->unsignedBigInteger('idUser');
            $table->text('content');
            $table->tinyInteger('status');
>>>>>>> 63214ab67ae6ef312b6d67b6a687c52c6faf1118
            $table->unsignedInteger('idProduct');
            $table->string('name',255);
            $table->string('email',255);
            $table->text('content');
            $table->timestamps();
<<<<<<< HEAD
            $table->foreign('idProduct')->references('idProduct')->on('products')->onUpdate('cascade')->onDelete('cascade');
=======
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idProduct')->references('idProduct')->on('products')->onDelete('cascade');
>>>>>>> 63214ab67ae6ef312b6d67b6a687c52c6faf1118
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment');
    }
};
