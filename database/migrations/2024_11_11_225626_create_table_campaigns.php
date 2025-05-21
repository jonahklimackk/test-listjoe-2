<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCampaigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('affiliate_id')->unsigned();
            // $table->foreign('affiliate_id')->references('id')->on('users');
            $table->string('name')->default('aff');
            $table->string('value')->default('/');
            $table->integer('sales')->default(0);
            $table->integer('clicks')->default(0);
            $table->integer('raw_clicks')->default(0);
            $table->integer('confirms')->default(0);
            $table->integer('joins')->default(0);
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
        Schema::dropIfExists('campaigns');
    }
}

