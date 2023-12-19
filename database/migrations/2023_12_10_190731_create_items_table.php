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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teams_id');
            $table->foreign('teams_id')->references('id')->on('teams');
            $table->unsignedBigInteger('finance_id');
            $table->foreign('finance_id')->references('id')->on('finances');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('item_name')->nullable();
            $table->integer('item_quantity')->nullable();
            $table->integer('item_unit_price')->nullable();
            $table->integer('item_total_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
