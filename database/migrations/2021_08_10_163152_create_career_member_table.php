<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareerMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_member', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('career_id')->unsigned();
            $table->string('name');
            $table->string('email');
            $table->string('cv_or_resume');
            $table->string('linkedin');
            $table->string('socialMedia');
            $table->integer('status');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('career_id')
                ->references('id')
                ->on('career')
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
        Schema::dropIfExists('career_member');
    }
}
