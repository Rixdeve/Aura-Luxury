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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('description');
            $table->decimal('price', 10, 2);
            $table->decimal('discounted_price', 10, 2)->nullable();
            $table->enum('types', ['Male', 'Female', 'Unisex']);
            $table->enum('availability', ['In Stock', 'Out of Stock']);
            $table->integer('qty')->default(0);
            $table->string('brand')->nullable();
            $table->string('watch_color')->nullable();
            $table->string('img_url')->nullable();
            $table->enum('category', ['Watch', 'Perfume']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
