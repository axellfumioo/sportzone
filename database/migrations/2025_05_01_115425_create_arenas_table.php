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
        Schema::create('arenas', function (Blueprint $table) {
            $table->id();
            $table->string('arena_slugs');
            $table->foreignId('sports_list_id')->constrained()->onDelete('cascade');
            $table->string('arena_name');
            $table->string('arena_description');
            $table->string('arena_rating');
            $table->string('arena_reviews');
            $table->string('arena_opening_hours');
            $table->string('arena_closing_hours');
            $table->longText('arena_address');
            $table->integer('arena_price');
            $table->string('arena_price_range');
            $table->enum('selection_type', ['difficulty', 'room']);
            $table->json('selections');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arenas');
    }
};
