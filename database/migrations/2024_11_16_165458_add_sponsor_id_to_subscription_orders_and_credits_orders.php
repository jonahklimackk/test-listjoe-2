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
        Schema::table('subscription_orders', function (Blueprint $table) {
            $table->unsignedInteger('sponsor_id')->default(0)->nullable();
        });
        Schema::table('credits_orders', function (Blueprint $table) {
            $table->unsignedInteger('sponsor_id')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscription_orders', function (Blueprint $table) {
            $table->dropColumn('sponsor_id');
        });
        Schema::table('credits_orders', function (Blueprint $table) {
            $table->dropColumn('sponsor_id');
        });
    }
};
