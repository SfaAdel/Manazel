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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('sub_service_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->date('day')->nullable();
            $table->time('time')->nullable();
            $table->foreignId('provider_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->enum('status',['canceled','pending','completed'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
