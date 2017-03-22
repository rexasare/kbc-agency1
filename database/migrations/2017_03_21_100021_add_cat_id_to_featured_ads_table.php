<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCatIdToFeaturedAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('featured__ads', function (Blueprint $table) {
          $table->integer('cat_id')->after('id')->unsigned();
          $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('featured__ads', function (Blueprint $table) {
          $table->dropForeign(['cat_id']);
          $table->dropColumn('cat_id');
        });
    }
}
