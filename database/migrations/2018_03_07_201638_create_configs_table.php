<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::dropIfExists('configs');
        Schema::create('configs', function (Blueprint $table) {
            $table->integer('id');
            $table->string('username');
            $table->string('logo');
            $table->string('copyright');
            $table->string('favicon');
            $table->string('admin_logo');
            $table->string('sign_logo');
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
        Schema::dropIfExists('configs');
    }
}
