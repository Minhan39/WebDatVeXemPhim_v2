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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->constrained('users');
            $table->bigInteger('showtime_id')->constrainted('showtimes');
            $table->bigInteger('ticket_price_id')->constrainted('ticket_prices');
            $table->bigInteger('voucher_id')->nullable()->constrainted('vouchers');
            $table->bigInteger('gift_id')->nullable()->constrainted('gifts');
            $table->integer('quantity');
            $table->string('seats');
            $table->string('combos')->nullable();
            $table->string('payment');
            $table->double('reduced_price_by_voucher', 15, 8)->nullable();
            $table->double('reduced_price_by_point', 15, 8)->nullable();
            $table->double('reduced_price_by_gift', 15, 8)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
