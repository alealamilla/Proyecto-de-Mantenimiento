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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->nullable()->references('id')->on('owners');
            $table->foreignId('color_id')->nullable()->references('id')->on('colors');
            $table->foreignId('brand_id')->nullable()->references('id')->on('brands');
            $table->foreignId('type_id')->nullable()->references('id')->on('types');
            $table->string("placas")->nullable();
            $table->string("year")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
