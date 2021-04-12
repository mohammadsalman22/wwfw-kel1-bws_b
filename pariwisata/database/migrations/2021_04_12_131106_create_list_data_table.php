<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_data', function (Blueprint $table) {
            $table->integer('id_data',10);
            $table->string('nama',100);
            $table->string('harga',10);
            $table->string('gambar',150);
            $table->string('telepon',15);
            $table->text('alamat');
            $table->text('deskripsi');
            $table->string('slug',150);
            $table->integer('id_jenis_data')->length(10)->unsigned();
            $table->string('kategori',100);
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
        Schema::dropIfExists('list_data');
    }
}
