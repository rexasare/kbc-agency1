<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturedAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('featured__ads', function (Blueprint $table) {
        $table->increments('id');
        $table->string('ad_name');
        $table->string('ad_brand');
        $table->integer('ad_code');
        $table->text('ad_sdesc');
        $table->text('ad_desc');
        $table->string('ad_img');
        $table->integer('ad_quantity');
        $table->integer('ad_cost');
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
        Schema::drop('featured__ads');
    }
}
