<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('ad_conditions', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ad_id')->unsigned();
          $table->string('ad_conditon');
          $table->timestamps();
      });

      Schema::table('ad_conditions', function($table){
         $table->foreign('ad_id')->references('id')->on('ads')->onDelete('cascade');
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
      Schema::drop('ad_conditions');
    }
}
