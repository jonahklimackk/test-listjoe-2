<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('mailings', function (Blueprint $table) {
            $table->dropColumn('spent_credits');
            $table->integer('recipients')->default(0); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mailings', function (Blueprint $table) {
            $table->integer('spent_credits');
            $table->dropColumn('recipients');   
        });
    }
};
