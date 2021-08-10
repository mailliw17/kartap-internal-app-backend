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
            $table->integer('idCareer');
            $table->string('name');
            $table->string('email');
            $table->binary('cv/resume');
            $table->string('linkedin');
            $table->string('socialMedia');
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
        Schema::dropIfExists('career_member');
    }
}
