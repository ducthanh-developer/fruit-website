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
        Schema::create('bill', function (Blueprint $table) {
            $table->increments('idBill');
            $table->unsignedInteger('idUser');
            $table->float('total');
            $table->dateTime('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->foreign('idUser')->references('idUser')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill');
    }
};
