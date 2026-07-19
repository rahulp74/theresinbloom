<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $t) {
            $t->id();
            $t->string('slug')->unique();
            $t->string('name');
            $t->string('tagline')->nullable();
            $t->timestamps();
        });

        Schema::create('products', function (Blueprint $t) {
            $t->id();
            $t->string('slug')->unique();
            $t->string('name');
            $t->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $t->unsignedInteger('price'); // integer rupees
            $t->string('image'); // path relative to /public (e.g. images/product-x.jpg) or storage/products/x.jpg
            $t->string('swatch')->default('petal'); // petal|mist|leaf|lavender
            $t->boolean('best_seller')->default(false);
            $t->boolean('featured')->default(false);
            $t->boolean('customizable')->default(false);
            $t->text('description');
            $t->json('details')->nullable(); // array of bullet strings
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
    }
};
