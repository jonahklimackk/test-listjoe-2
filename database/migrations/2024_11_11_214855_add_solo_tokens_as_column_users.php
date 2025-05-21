<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoloTokensAsColumnUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
                // Schema::enableForeignKeyConstraints();
        Schema::table('users', function (Blueprint $table) {
            $table->integer('credits')->default(0);
            $table->integer('solo_tokens')->after('credits')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

         $table->dropColumn('solo_tokens');
         $table->dropColumn('credits');
     });
    }
}
