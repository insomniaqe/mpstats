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
            $table->id();
            $table->string('login', 20)->nullable();
            $table->string('password', 50)->nullable();
            $table->string('usertoken', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('group', 50)->nullable();
            $table->string('fio', 150)->nullable();
            $table->string('avatar', 150)->nullable();
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
