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
        Schema::create('custom_juices', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Customer's custom name for their juice
            $table->json('selected_fruits'); // Array of fruit IDs and quantities
            $table->enum('size', ['small', 'medium', 'large'])->default('medium');
            $table->enum('sugar_level', ['none', 'low', 'medium', 'high'])->default('medium');
            $table->enum('ice_level', ['none', 'light', 'regular', 'extra'])->default('regular');
            $table->boolean('add_protein')->default(false);
            $table->boolean('add_vitamins')->default(false);
            $table->decimal('total_price', 8, 2);
            $table->string('dominant_color'); // Color of the final juice blend
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_juices');
    }
};
