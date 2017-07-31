<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoodcontentTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moodcontent_tag', function (Blueprint $table) {
            $table->integer('moodcontent_id');
            $table->integer('tag_id');

            $table->foreign('moodcontent_id')->references('id')->on('moodcontent');
            $table->foreign('tag_id')->references('id')->on('tag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moodtag');
    }
}
