<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_booking', function (Blueprint $table) {
            $table->tinyInteger('kode_booking', false, true);
            $table->smallInteger('id_wisata', false, true);
            $table->smallInteger('id_travel_homestay', false, true);
            $table->smallInteger('jumlah_pesan');
            $table->timestamps();

            $table->foreign('kode_booking')->references('kode_booking')->on('booking')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_wisata')->references('id_wisata')->on('wisata')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_travel_homestay')->references('id_travel_homestay')->on('travel_homestay')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_booking');
    }
}
