<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEpisodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string( 'title')->index();
            $table->text( 'description');
            $table->string( 'duration');
            $table->string( 'airing_time');
            $table->string( 'thump')->default('play.png');
            $table->string( 'video_content');
            $table->unsignedInteger('tv_resource_id');
            $table->timestamps();
            $table->foreign('tv_resource_id')->references('id')->on('tv_resources')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodes');
    }
}
