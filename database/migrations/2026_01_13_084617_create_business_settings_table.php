<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('business_settings', function (Blueprint $table) {
            $table->id();
            
            // Personal Info
            $table->string('owner_first_name')->nullable();
            $table->string('owner_last_name')->nullable();
            
            // Legal Address
            $table->string('legal_address')->nullable();
            $table->string('legal_city')->nullable();
            $table->string('legal_zip')->nullable();
            $table->string('legal_province', 2)->nullable();
            $table->string('legal_country', 2)->default('IT');
            
            // Tax Info
            $table->string('tax_id')->nullable();
            $table->string('vat_number')->nullable();
            
            // Contacts
            $table->string('email')->nullable();
            $table->string('certified_email')->nullable();
            $table->string('phone_prefix')->default('+39');
            $table->string('phone')->nullable();
            
            // Business Info
            $table->string('business_name')->nullable();
            $table->text('business_description')->nullable();
            $table->string('website')->nullable();
            
            // Logo (private storage)
            $table->string('logo_path')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('business_settings');
    }
};