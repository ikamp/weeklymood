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
            $table->string('password')->nullable();
            $table->string('position')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('company_id');
            $table->boolean('is_manager');
            $table->boolean('is_active');
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
