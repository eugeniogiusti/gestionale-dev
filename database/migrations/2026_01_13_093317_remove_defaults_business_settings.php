<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('business_settings', function (Blueprint $table) {
            $table->string('legal_country', 2)->nullable()->default(null)->change();
            $table->string('phone_prefix')->nullable()->default(null)->change();
        });
    }

    public function down(): void
    {
        Schema::table('business_settings', function (Blueprint $table) {
            $table->string('legal_country', 2)->default('IT')->change();
            $table->string('phone_prefix')->default('+39')->change();
        });
    }
};