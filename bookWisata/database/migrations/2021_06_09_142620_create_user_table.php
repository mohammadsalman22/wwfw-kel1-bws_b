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
            $table->smallIncrements('id_user');
            $table->string('username', 50);
            $table->string('password', 60);
            $table->string('nama', 100);
            $table->enum('jk', ['L', 'P']);
            $table->text('alamat');
            $table->string('no_hp', 15);
            $table->string('email', 50);
            $table->string('foto', 255);
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
