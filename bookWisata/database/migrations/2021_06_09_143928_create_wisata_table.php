<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWisataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisata', function (Blueprint $table) {
            $table->smallIncrements('id_wisata');
            $table->string('nama_wisata', 50);
            $table->text('alamat_wisata');
            $table->string('gambar_wisata', 255);
            $table->text('deskripsi_wisata');
            $table->bigInteger('harga_wisata');
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
        Schema::dropIfExists('wisata');
    }
}
