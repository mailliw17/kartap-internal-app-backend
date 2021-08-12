<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechCareerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idDepartment');
            $table->string('requestNumber');
            $table->string('position');
            $table->text('jobDescription');
            $table->text('requirement');
            $table->text('description');
            $table->string('applyUrl');
            $table->integer('vacancies');
            $table->integer('period');
            $table->integer('status');
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
        Schema::dropIfExists('tech_career');
    }
}
