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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('phone_number_secondary')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('second_name')->nullable();
            $table->json('phone_numbers')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('x')->nullable();
            $table->string('whatsapp')->nullable();
            $table->json('others')->nullable();
            $table->foreignId("business_id")->nullable()->constrained()->nullOnDelete();
            $table->foreignId("location_id")->nullable()->constrained()->nullOnDelete();
            $table->json('details')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('manufacturers', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('phone_number_secondary')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('second_name')->nullable();
            $table->json('phone_numbers')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('x')->nullable();
            $table->string('whatsapp')->nullable();
            $table->json('others')->nullable();
            $table->foreignId("business_id")->nullable()->constrained()->nullOnDelete();
            $table->foreignId("location_id")->nullable()->constrained()->nullOnDelete();
            $table->json('details')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('distributors', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('phone_number_secondary')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('second_name')->nullable();
            $table->json('phone_numbers')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('x')->nullable();
            $table->string('whatsapp')->nullable();
            $table->json('others')->nullable();
            $table->foreignId("business_id")->nullable()->constrained()->nullOnDelete();
            $table->foreignId("location_id")->nullable()->constrained()->nullOnDelete();
            $table->json('details')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
        Schema::dropIfExists('manufacturers');
        Schema::dropIfExists('distributors');
    }
};
