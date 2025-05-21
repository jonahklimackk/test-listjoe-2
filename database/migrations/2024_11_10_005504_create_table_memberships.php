<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMemberships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
                        $table->integer('team_id');
                        $table->string('role');
            $table->string('name');
            $table->string('description');
            $table->double('price');
            $table->integer('period');
            $table->integer('mailing_freq');
            $table->integer('mailing_bonus');
            $table->integer('credits_bonus');
            $table->integer('mailing_max');
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
        Schema::dropIfExists('memberships');
    }
}
