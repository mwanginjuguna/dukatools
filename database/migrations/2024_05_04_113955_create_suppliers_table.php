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
            $table->string('type')->nullable();
            $table->foreignId("user_id")->constrained()->onDelete('cascade');
            $table->foreignId("business_id")->nullable()->constrained()->nullOnDelete();
            $table->foreignId("location_id")->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('manufacturers', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('type')->nullable();
            $table->foreignId("user_id")->constrained()->onDelete('cascade');
            $table->foreignId("business_id")->nullable()->constrained()->nullOnDelete();
            $table->foreignId("location_id")->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('distributors', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('type')->nullable();
            $table->foreignId("user_id")->constrained()->onDelete('cascade');
            $table->foreignId("business_id")->nullable()->constrained()->nullOnDelete();
            $table->foreignId("location_id")->nullable()->constrained()->nullOnDelete();
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
