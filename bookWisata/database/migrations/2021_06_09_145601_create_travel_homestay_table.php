<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelHomestayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_homestay', function (Blueprint $table) {
            $table->smallIncrements('id_travel_homestay');
            $table->string('nama_travel_homestay', 50);
            $table->text('alamat_travel_homestay');
            $table->string('gambar_travel_homestay', 255)->nullable();
            $table->text('deskripsi_travel_homestay');
            $table->bigInteger('harga_travel_homestay');
            $table->text('tag');
            $table->string('slug', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('travel_homestay');
    }
}
