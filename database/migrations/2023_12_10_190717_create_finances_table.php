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
        Schema::create('finances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teams_id');
            $table->foreign('teams_id')->references('id')->on('teams');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('finance_title');
            $table->integer('finance_amount');
            $table->text('finance_description')->nullable();
            $table->date('finance_purchase_date')->default(now());
            $table->integer('transaction_type')->nullable();
            $table->string('supplier_address')->nullable();
            $table->string('supplier_name')->nullable();
            $table->integer('supplier_phone')->nullable();
            $table->integer('finance_tax_amount')->nullable();
            $table->integer('finance_tax_rate')->nullable();
            $table->string('document_type')->nullable(); 
            $table->unsignedBigInteger('file_id')->nullable(); 
            $table->foreign('file_id')->references('id')->on('imported_files')->onDelete('cascade');
            $table->text('image_path')->nullable();
            $table->unsignedBigInteger('category_id')->default(17); // Default to category with id 17
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finances');
    }
};
