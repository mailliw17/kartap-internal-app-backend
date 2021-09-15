<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgsRegisteredTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sgs_registered', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_peserta_1');
            $table->integer('id_peserta_2');
            $table->string('total_payment');
            $table->integer('status');
            $table->date('date_paid');
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
        Schema::dropIfExists('sgs_registered');
    }
}
