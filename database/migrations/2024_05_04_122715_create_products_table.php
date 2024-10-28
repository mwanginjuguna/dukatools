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
        Schema::create('return_policies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('min_order_quantity')->nullable();
            $table->unsignedBigInteger('max_days_to_return')->nullable();
            $table->unsignedBigInteger('returns_allowed')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku')->nullable();
            $table->string('supplier_sku')->nullable();
            $table->string('barcode')->nullable();
            $table->text('description');

            $table->decimal('price', 10, 2);
            $table->decimal('buying_price', 10, 2)->default(0);
            $table->decimal('selling_price', 10, 2)->default(0);
            $table->decimal('tax_percent', 10, 2)->nullable()->default(0);
            $table->decimal('shipping_fee', 10, 2)->nullable()->default(0);

            $table->integer('stock_quantity')->default(1);
            $table->integer('stock_on_shelf')->default(1);

            $table->boolean('is_active')->default(true);
            $table->boolean('on_offer')->default(false);
            $table->boolean('is_new')->default(false);

            $table->string('shipped_from')->nullable();
            $table->string('image')->nullable();

            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('vendor_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('business_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('branch_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('brand_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('sub_category_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('return_policy_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('supplier_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('manufacturer_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('distributor_id')->nullable()->constrained()->nullOnDelete();

            $table->unsignedBigInteger('views')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('product_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('product_variations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('type')
                ->comment('Size, color, dimensions, material, packaging size, weight, storage capacity, etc');

            $table->string('details')
                ->comment('blue, 11 X 29 X 40 inches, 10 gb, cotton, 8kg, etc');

            $table->decimal('price_change_percentage', 10, 2)->nullable()
                ->comment('Positive percentage change in price, negative percentage change in price');

            $table->unsignedBigInteger('stock_quantity')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->text('review');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('product_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->decimal('rating', 1, 1)->default(5.0);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->string('image_location')->nullable(); // location in public disk storage e.g. 'products/image_1.png'
            $table->string('url')->nullable(); // if hosted elsewhere
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_policies');
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_features');
        Schema::dropIfExists('product_variations');
        Schema::dropIfExists('product_reviews');
        Schema::dropIfExists('product_ratings');
        Schema::dropIfExists('product_images');
    }
};
