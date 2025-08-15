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
        Schema::create('fruits', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('emoji');
            $table->string('color'); // CSS color for juice visualization
            $table->decimal('price_per_serving', 8, 2); // Price for adding this fruit
            $table->text('description')->nullable();
            $table->json('nutritional_benefits')->nullable();
            $table->boolean('is_available')->default(true);
            $table->integer('stock_level')->default(100); // For inventory tracking
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fruits');
    }
};
