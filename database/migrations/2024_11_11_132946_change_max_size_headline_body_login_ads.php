<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeMaxSizeHeadlineBodyLoginAds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::enableForeignKeyConstraints();
        Schema::table('login_ads', function (Blueprint $table) {
            $table->longtext('body')->change();
            $table->string('headline', 500)->change();
            $table->string('url', 500)->change();
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
            $table->string('body', 255)->change();
            $table->string('headline', 255)->change();
            $table->varchar('url', 255)->change();
        });
    }
}
