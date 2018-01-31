<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('home_page')->nullable();
            $table->string('title_site')->nullable();
            $table->string('theme');
            $table->string('favicon')->nullable();
            $table->string('author')->nullable();
            $table->string('googlewebmaster')->nullable();
            $table->string('bingwebmaster')->nullable();
            $table->string('alexa')->nullable();
            $table->string('googleanalytic')->nullable();
            $table->string('revistafter')->nullable();
            $table->string('robots')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
