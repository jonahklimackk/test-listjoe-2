<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnViewsTopMemberAds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('top_member_ads', function (Blueprint $table) {
            $table->integer('views')->default(0)->after('clicks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
           Schema::table('top_member_ads', function (Blueprint $table) {
           $table->dropColumn('views');
        });
    }
}
