<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTvResources extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tv_resources', function (Blueprint $table) {
            $table->increments('id');
            $table->string( 'title')->index();
            $table->text( 'description');
            $table->string( 'airing_time');
            $table->enum( 'resource_type' , ['series' , 'show']);
            $table->string( 'resource_cover')->default('cover.jpg');
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
        Schema::dropIfExists('tv_resources');
    }
}
