<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddScatIdToFeaturedAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('featured__ads', function (Blueprint $table) {
          $table->integer('scat_id')->after('cat_id')->unsigned();
          $table->foreign('scat_id')->references('id')->on('sub__categories')->onDelete('cascade');
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
          $table->dropForeign(['scat_id']);
          $table->dropColumn('scat_id');
        });
    }
}
