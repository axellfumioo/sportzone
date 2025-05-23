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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sports_id');
            $table->string('selections');
            $table->integer('qty');
            $table->time('time');
            $table->date('validuntil');
            $table->timestamps();
            $table->enum('is_used', ['used', 'unused'])->default('unused');
            $table->enum('payment_status', ['unpaid', 'paid'])->default('unpaid');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sports_id')->references('id')->on('sports_lists')->onDelete('cascade');
            $table->string('orderId');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
