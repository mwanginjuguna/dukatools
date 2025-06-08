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
        // Add category column to businesses table
        Schema::table('businesses', function (Blueprint $table) {
            $table->string('category')->nullable()->after('name');
        });

        Schema::create('business_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained()->cascadeOnDelete();
            $table->string('legal_name')->nullable();
            $table->string('alternate_name')->nullable();
            $table->json('address')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('price_range')->nullable();
            $table->json('opening_hours')->nullable();
            $table->string('payment_accepted')->nullable();
            $table->float('aggregate_rating')->nullable();
            $table->unsignedInteger('rating_count')->default(0);
            $table->text('slogan')->nullable();
            $table->string('founding_date')->nullable();
            $table->string('duns')->nullable();
            $table->string('tax_id')->nullable();
            $table->json('currencies_accepted')->nullable();
            $table->json('serves_cuisine')->nullable();
            $table->string('business_type')->nullable();
            $table->text('awards')->nullable();
            $table->json('photos')->nullable();
            $table->json('social_media')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_details');

        Schema::table('businesses', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
};

