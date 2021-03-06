<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('ads', function (Blueprint $table) {
          $table->increments('id');
          $table->string('ad_name');
          $table->string('ad_brand');
          $table->integer('ad_code');
          $table->text('ad_sdesc');
          $table->text('ad_desc');
          $table->string('ad_img');
          $table->integer('ad_quantity');
          $table->decimal('ad_cost', 10,2);
          $table->string('ad_location');
          $table->string('ad_conditon');
          $table->string('ad_telno');
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
        Schema::drop('ads');
    }
}
