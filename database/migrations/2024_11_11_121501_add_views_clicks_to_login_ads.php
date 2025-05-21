<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddViewsClicksToLoginAds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('login_ads', function (Blueprint $table) {
            $table->integer('clicks')->default(0)->after('url');
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
           Schema::table('login_ads', function (Blueprint $table) {
            $table->dropColumn('clicks');
           $table->dropColumn('views');
        });
    }
}
