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
        Schema::create('court_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('court_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('court_price_id');
            $table->dateTime('ordered_at');
            $table->integer('status');

            $table->foreign('court_id')->references('id')->on('courts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('court_price_id')->references('id')->on('court_prices')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('court_orders');
    }
};
