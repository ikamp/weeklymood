<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('position');
            $table->string('avatar');
            $table->integer('department_id');
            $table->integer('company_id');
            $table->boolean('is_manager');
            $table->timestamps();
            $table->rememberToken();

            $table->foreign('department_id')->references('id')->on('department');
            $table->foreign('company_id')->references('id')->on('company');

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
