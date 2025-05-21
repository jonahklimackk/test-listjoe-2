<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsFromSettingsPageToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
             $table->string('list_email')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('payment_email')->nullable();
            // $table->string('payza_email')->nullable();
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
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
             $table->dropColumn('contact_email');
             $table->dropColumn('payment_email');
             // $table->dropColumn('payza_email');
        });
    }
}
