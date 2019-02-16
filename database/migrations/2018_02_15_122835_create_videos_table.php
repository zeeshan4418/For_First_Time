<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('download');
            $table->string('favorite');
            $table->string('server_1');
            $table->string('server_2');
            $table->string('server_3');
            $table->string('server_4');
            $table->string('server_5');
            $table->string('server_6');
            $table->longText('body');
            $table->string('img');
            $table->string('poster');
            $table->string('rate_stars');
            $table->string('duration');
            $table->string('quality');
            $table->string('release');
            $table->string('imdb');
            $table->string('trailer');
            $table->string('director');
            $table->string('writers');
            $table->string('stars');
            $table->string('categorys');
            $table->string('tv');
            $table->integer('pro');
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
        Schema::dropIfExists('videos');
    }
}
