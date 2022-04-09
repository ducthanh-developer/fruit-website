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
            $table->unsignedBigInteger('idUser');
            $table->float('total');
            $table->dateTime('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('status')->default(1)->comment('1-Đang xử lý,2-Đã xác nhận,3-Đang vận chuyển');
            $table->timestamps();
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
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
