<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trannings', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->string('timeStart', 100)->nullable();
            $table->string('timeEnd', 100)->nullable();
            $table->string('about', 100)->nullable();
            $table->string('status', 100)->nullable();
            $table->string('quest_data', 100)->nullable();
            $table->string('array_users', 100)->nullable();
            $table->string('createdId', 100)->nullable();
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
        Schema::dropIfExists('trannings');
    }
}
