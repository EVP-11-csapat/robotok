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
            $table->foreignId('cargo_id')->references('id')->on('cargo_templates');
            $table->integer('arrival_day');
            $table->integer('remaining_count');
            $table->foreignId('simulation_id')->references('id')->on('simulations');
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
