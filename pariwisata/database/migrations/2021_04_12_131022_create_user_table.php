<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->integer('id_user',10);
            $table->string('nama',100);
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan']);
            $table->string('gambar',150);
            $table->string('telepon',15);
            $table->text('alamat');
            $table->string('email',50);
            $table->string('password',20);
            $table->text('deskripsi');
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
        Schema::dropIfExists('user');
    }
}
