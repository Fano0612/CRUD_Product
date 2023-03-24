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
        Schema::create('product__management', function (Blueprint $table) {
            $table->integer('product_id')->length(10);
            $table->string('product_name')->length(255);
            $table->BigInteger('product_price')->length(50);
            $table->BigInteger('product_stock')->length(50);
            $table->string('product_picture')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product__management');
    }
};
