<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdImg1ToFeaturedAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('featured__ads', function (Blueprint $table) {
            $table->string('ad_img1')->after('ad_img');
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
            $table->dropColumn('ad_img1');
        });
    }
}
