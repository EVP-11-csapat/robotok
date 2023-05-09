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
        Schema::create('chargers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('storeID')->references('id')->on('charger_store');
            $table->foreignId('chargeeID')->nullable()->references('id')->on('robots');
            $table->boolean('active');
            $table->integer('activeHours');
            $table->foreignId('simulationID')->references('id')->on('simulations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chargers');
    }
};