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
            $table->foreignId('cargoID')->references('id')->on('cargo');
            $table->integer('remainingCount');
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