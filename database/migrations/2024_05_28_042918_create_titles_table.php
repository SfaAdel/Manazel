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
        Schema::create('titles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('short_description');
            $table->text('long_description')->nullable();
            $table->string('icon')->nullable();
            $table->string('banner')->nullable();
            $table->enum('section',['about_us','services','testimonials','advantages','teams','blogs','contacts','main'])->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titles');
    }
};
