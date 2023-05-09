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
        Schema::create('generated_cargo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cargoID')->references('id')->on('cargo_templates');
            $table->integer('arrivalDay');
            $table->integer('remainingCount');
            $table->foreignId('simulationID')->references('id')->on('simulations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generated_cargo');
    }
};