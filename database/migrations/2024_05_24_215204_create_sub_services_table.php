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
        Schema::create('sub_services', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->string('icon')->nullable();
            $table->string('bannar')->nullable();
            $table->foreignId('service_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('active')->default(1)->nullable();
            $table->boolean('price_on_serve')->default(0)->nullable();
            $table->decimal('price')->default(0)->nullable();
            $table->boolean('offer')->default(0)->nullable();
            $table->decimal('discount_percentage')->nullable();
            $table->decimal('final_price')->nullable();
            $table->integer('providers')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_services');
    }
};
