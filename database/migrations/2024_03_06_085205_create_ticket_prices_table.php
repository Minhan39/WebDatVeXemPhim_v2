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
        Schema::create('ticket_prices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('root_id')->constrained('ticket_prices')->default(0);
            $table->bigInteger('cinema_id')->constrained('cinemas');
            $table->string('name');
            $table->double('price', 15, 8);
            $table->boolean('is_active');
            $table->boolean('is_always_available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_prices');
    }
};
