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
        Schema::create('user', function (Blueprint $table) {
            $table->increments('idUser');
            $table->string('fullName', 50);
            $table->string('email', 100);
            $table->string('address', 100);
            $table->string('phoneNumber', 15);
            $table->dateTime('dateOfBirth');
            $table->string('username', 50);
            $table->string('password', 200);
            $table->unsignedInteger('idRole');
            $table->timestamps();
            $table->foreign('idRole')->references('idRole')->on('role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};
