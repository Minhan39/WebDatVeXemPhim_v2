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
        Schema::table('ticket_prices', function (Blueprint $table) {
            $table->bigInteger('unit_id')->constrained('units');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ticket_prices', function (Blueprint $table) {
            //
        });
    }
};
