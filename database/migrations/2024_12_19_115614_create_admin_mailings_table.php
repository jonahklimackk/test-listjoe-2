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
        Schema::create('admin_mailings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default(1)->unsigned();
            // $table->foreign('user_id')->references('id')->on('users');
            $table->string('subject');
            $table->text('body');
            $table->string('url');
            $table->string('status');
            $table->integer('recipients')->default(0);
            $table->integer('clicks')->default(0);;
            $table->integer('views')->default(0);;
            // $table->boolean('save_message')
            $table->timestamps();        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_mailings');
    }
};
