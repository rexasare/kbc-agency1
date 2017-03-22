<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdIdToFeaturedConditonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('featured_conditons', function (Blueprint $table) {
          $table->integer('ad_id')->after('id')->unsigned();
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
        Schema::table('featured_conditons', function (Blueprint $table) {
          $table->dropForeign(['ad_id']);
          $table->dropColumn('ad_id');
        });
    }
}
