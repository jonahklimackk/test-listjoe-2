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
        Schema::table('cancel_feedback', function (Blueprint $table) {

            $table->longtext('feedback')->nullable()->change();
            $table->longtext('notes')->nullable()->change();
        });

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cancel_feedback', function (Blueprint $table)     {
            $table->longtext('notes')->change();
            $table->longtext('feedback')->nullable()->change();
        });
    }
};
