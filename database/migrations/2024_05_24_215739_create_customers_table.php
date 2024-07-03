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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('phone')->unique();

            // $table->timestamp('mobile_verified_at')->nullable();
            // $table->string('mobile_verify_code')->unique()->nullable();
            // $table->tinyInteger('mobile_attempts_left')->default(0);
            // $table->timestamp('mobile_last_attempt_date')->nullable();
            // $table->timestamp('mobile_verify_code_sent_at')->nullable();

            $table->string('otp')->nullable();
            $table->timestamp('otp_till')->nullable();
            $table->timestamp('phone_verified_at')->nullable();

            $table->string('password');
            $table->string('profile_img')->nullable();
            $table->text('address')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
