<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('document_label', function (Blueprint $table) {
            $table->foreignId('document_id')->constrained()->onDelete('cascade');
            $table->foreignId('label_id')->constrained()->onDelete('cascade');

            // Primary key composita
            $table->primary(['document_id', 'label_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('document_label');
    }
};