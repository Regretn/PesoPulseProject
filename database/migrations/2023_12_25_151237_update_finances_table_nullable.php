<?php
// database/migrations/YYYY_MM_DD_HHMMSS_update_finances_table_nullable.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFinancesTableNullable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('finances', function (Blueprint $table) {
            // Make 'finance_amount' column nullable
            $table->integer('finance_amount')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('finances', function (Blueprint $table) {
            // Reverse the change (if needed)
            $table->integer('finance_amount')->nullable(false)->change();
        });
    }
}
