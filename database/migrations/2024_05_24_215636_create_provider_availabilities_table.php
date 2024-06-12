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
        // migration file for provider_availabilities table
        Schema::create('provider_availabilities', function (Blueprint $table) {
            $table->id();
            $table->json('off_days')->nullable();
            $table->foreignId('provider_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->date('month');
            $table->timestamps();
            $table->unique(['provider_id', 'month']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provider_availabilities');
    }
};
