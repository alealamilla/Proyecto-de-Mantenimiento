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
        Schema::create('receptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->nullable()->references('id')->on('owners');
            $table->foreignId('car_id')->nullable()->references('id')->on('cars');
            $table->string("reason")->nullable();
            $table->datetime("reception_date");
            $table->foreignId('status_id')->nullable()->references('id')->on('statuses');
            $table->datetime("next_reception");
            $table->foreignId('user_id')->nullable()->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receptions');
    }
};
