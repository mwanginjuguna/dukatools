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
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('duration_months');
            $table->json('features')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('vendor_id')->constrained()->cascadeOnDelete();
            $table->foreignId('business_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subscription_plan_id')->constrained()->cascadeOnDelete();
            $table->timestamp('start_date');
            $table->timestamp('end_date')->nullable();
            $table->integer('remaining_subscription_days')->default(0);
            $table->string('status')->default('pending');
            $table->boolean('has_trial')->default(false);
            $table->integer('trial_days')->default(0);
            $table->integer('remaining_trial_days')->default(0);
            $table->timestamp('trial_starts_at')->default(0);
            $table->timestamp('trial_ends_at')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_plans');
        Schema::dropIfExists('subscriptions');
    }
};
