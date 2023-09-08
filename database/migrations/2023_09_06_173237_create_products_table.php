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
            $table->string("name",50);
            $table->string("description");
            $table->unsignedDecimal("ratting",8,2);
            $table->unsignedDecimal("original_price",5,2);
            $table->double("sale_price",5,2);
            $table->unsignedSmallInteger("quantity");
            $table->char("size",5);
            $table->string("color",50);
            $table->string("image",50);
            $table->unsignedBigInteger("category_id");
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade');
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
