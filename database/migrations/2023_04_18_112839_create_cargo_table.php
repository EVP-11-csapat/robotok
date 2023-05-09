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
        Schema::create('cargo_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('perishable');
            $table->foreignId('simulationID')->references('id')->on('simulations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargo');
    }
};