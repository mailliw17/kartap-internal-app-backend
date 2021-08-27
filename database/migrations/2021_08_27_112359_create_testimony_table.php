<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimony', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('event_member_id')->unsigned();
            $table->bigInteger('event_id')->unsigned();
            $table->text('testimony');
            $table->text('feedback');
            $table->integer('status');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('event_id')
                ->references('id')
                ->on('event')
                ->onCascade('delete');

            $table->foreign('event_member_id')
                ->references('id')
                ->on('event_member')
                ->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testimony');
    }
}
