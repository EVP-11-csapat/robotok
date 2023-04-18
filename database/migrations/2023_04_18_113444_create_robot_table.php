<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('robot', function (Blueprint $table) {
            $table->id();
            $table->foreignId('storeID')->references('id')->on('robot_store');
            $table->float('charge');
            $table->boolean('active');
            $table->integer('activeHours');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('robot');
    }
};