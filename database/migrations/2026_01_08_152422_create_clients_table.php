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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            
            // Required fields
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('status', ['lead', 'active', 'archived'])->default('lead');
            
            // Optional contact fields
            $table->string('vat_number', 20)->nullable();
            $table->string('phone_prefix', 10)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('pec')->nullable();
            
            // Optional billing address fields
            $table->text('billing_address')->nullable();
            $table->string('billing_city', 100)->nullable();
            $table->string('billing_zip', 20)->nullable();
            $table->string('billing_province', 5)->nullable();
            $table->string('billing_country', 2)->nullable(); // ISO code
            $table->string('billing_recipient_code', 7)->nullable(); // Codice SDI
            
            // Optional web/social fields
            $table->string('website')->nullable();
            $table->string('linkedin')->nullable();
            
            // Notes
            $table->text('notes')->nullable();
            
            // Timestamps
            $table->timestamps();
            
            // Soft deletes
            $table->softDeletes();
            
            // Indexes
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};