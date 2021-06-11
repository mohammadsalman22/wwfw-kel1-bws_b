<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->tinyIncrements('kode_booking');
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_akhir');
            $table->bigInteger('total_harga');
            $table->smallInteger('id_pembayaran', false, true);
            $table->mediumInteger('id_admin', false, true);
            $table->smallInteger('id_user', false, true);
            $table->timestamps();

            $table->foreign('id_pembayaran')->references('id_pembayaran')->on('metode_pembayaran')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_admin')->references('id_admin')->on('admin')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_user')->references('id_user')->on('user')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking');
    }
}
