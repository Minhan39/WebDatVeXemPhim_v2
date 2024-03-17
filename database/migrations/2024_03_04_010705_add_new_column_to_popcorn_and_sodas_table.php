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
        Schema::table('popcorn_and_sodas', function (Blueprint $table) {
            $table->bigInteger('country_id')->after('id')->contrained('countries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('popcorn_and_sodas', function (Blueprint $table) {
            $table->dropColumn('country_id');
        });
    }
};
