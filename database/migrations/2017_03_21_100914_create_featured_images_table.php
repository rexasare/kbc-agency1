<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturedImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('featured_images', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('ad_id')->unsigned();
      $table->string('ad_imgs');
      $table->timestamps();
  });

  Schema::table('featured_images', function($table){
     $table->foreign('ad_id')->references('id')->on('featured__ads')->onDelete('cascade');
  });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropForeign(['ad_id']);
      Schema::drop('featured_images');
    }
}
