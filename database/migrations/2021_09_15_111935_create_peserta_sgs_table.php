<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaSgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta_sgs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('phone');
            $table->string('email');
            $table->text('alamat');
            $table->string('universitas');
            $table->string('jurusan');
            $table->date('DOB');
            $table->softDeletes();
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
        Schema::dropIfExists('peserta_sgs');
    }
}
