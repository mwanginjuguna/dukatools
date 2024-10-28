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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('name')->nullable();
            $table->foreignId('vendor_id')->constrained()->cascadeOnDelete();
            $table->foreignId('business_id')->constrained()->cascadeOnDelete();
            $table->foreignId('location_id')->constrained()->cascadeOnDelete();
            $table->foreignId('branch_id')->constrained()->cascadeOnDelete();
            $table->string('type')->nullable();
            $table->json('details')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('inventory_items', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('item_name')->nullable();
            $table->foreignId('product_id')->nullable()->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('quantity')->default(1);
            $table->unsignedBigInteger('min_stock_level')->default(5);
            $table->foreignId('inventory_id')->constrained()->cascadeOnDelete();
            $table->foreignId('supplier_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('manufacturer_id')->nullable()->constrained()->cascadeOnDelete();

            $table->unsignedBigInteger('reorder_level')->nullable();
            $table->unsignedBigInteger('reorder_quantity')->nullable();

            $table->decimal('buying_price', 10, 2)->default(0);
            $table->decimal('selling_price', 10, 2)->default(0);

            $table->timestamp('stocked_at')->nullable();
            $table->timestamp('last_stocked_at')->nullable();
            $table->timestamp('last_reordered_at')->nullable();
            $table->timestamp('last_purchased_at')->nullable();

            $table->json('details')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('stock_orders', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->unsignedBigInteger('quantity')->default(1);
            $table->decimal('price', 10, 2)->default(0);
            $table->string('status')->default('pending');

            $table->foreignId('vendor_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('inventory_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('business_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('branch_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('supplier_id')->nullable()->constrained()->nullOnDelete();

            $table->timestamp('ordered_at')->nullable();
            $table->timestamp('shipped_at')->nullable();

            $table->json('details')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        // stock order items
        Schema::create('stock_order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quantity')->default(1);
            $table->decimal('unit_price', 10, 2)->default(0);

            $table->foreignId('stock_order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('inventory_item_id')->nullable()->constrained()->nullOndelete();
            $table->foreignId('manufacturer_id')->nullable()->constrained()->nullOndelete();

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
        Schema::dropIfExists('inventories');
        Schema::dropIfExists('inventory_items');
        Schema::dropIfExists('stock_orders');
        Schema::dropIfExists('stock_order_items');
    }
};
