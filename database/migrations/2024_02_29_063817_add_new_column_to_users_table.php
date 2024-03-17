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
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('city_id')->constrained('cities')->after('id')->nullable();
            $table->integer('points')->after('city_id')->default(0);
            $table->double('total_expenditure', 15, 8)->after('points')->default(0);
            $table->bigInteger('gift_received')->after('total_expenditure')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('city_id');
            $table->dropColumn('points');
            $table->dropColumn('total_expenditure');
            $table->dropColumn('gift_received');
        });
    }
};
